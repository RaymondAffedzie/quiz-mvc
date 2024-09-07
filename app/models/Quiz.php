<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Quiz class
 */
class Quiz
{
	use Model;
	use \Controller\MainController;

	protected $table = 'quizzes';
	protected $primaryKey = 'quiz_id';
	protected $uniqueColumn = 'quiz_name';

	protected $allowedColumns = [
		'quiz_id',
		'level_id',
		'subject_id',
		'category_id',
		'year_or_form',
		'date_created',
		'date_updated',
	];

	/*****************************
	 * 	rules include:
		required
		alpha
		email
		numeric
		unique
		symbol
		longer_than_8_chars
		alpha_numeric_symbol
		alpha_numeric
		alpha_symbol
		match
		terms
	 * 
	 ****************************/

	protected $onInsertValidationRules = [

		'quiz_id' => [
			'unique',
			'required',
		],
		'subject_id' => [
			'required',
		],
		'category_id' => [
			'required',
		],
		'level_id' => [
			'required',
		],
		'year_or_form' => [
			'required',
			'alpha_numeric_space',
		],
	];

	protected $onUpdateValidationRules = [

		'quiz_id' => [
			'required',
		],
		'subject_id' => [
			'required',
		],
		'category_id' => [
			'required',
		],
		'level_id' => [
			'required',
		],
		'year_or_form' => [
			'required',
			'alpha_numeric_space',
		],
	];

	public function allRecords() {
		return $this->findAll();
	}

	// function for self quiz sign up
	public function add($data)
	{
		if ($this->validate($data)) {
			//add extra quiz columns here
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['quiz_id'] = $data['quiz_id'];
			$data['level_id'] = $data['level_id'];
			$data['subject_id'] = $data['subject_id'];
			$data['category_id'] = $data['category_id'];
			$data['year_or_form'] = $data['year_or_form'];
			
			$code = new Code();
			$data['quiz_id'] = $code->uuid_v4();

			$this->insert($data);
			redirect('admin/quizzes');
		}
	}

	// function for admin to edit quiz record
	public function edit($data)
	{
		if ($this->validate($data)) {
			
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['level_id'] = $data['level_id'];
			$data['subject_id'] = $data['subject_id'];
			$data['category_id'] = $data['category_id'];

			$this->update($data['quiz_id'], $data, $this->primaryKey);
			message("quiz account updated!");

			redirect("admin/quiz/{$data['quiz_id']}");
			
		}
	}

	// function for admin to delete quiz record 
	public function del($data)
	{
		$this->delete($data['quiz_id'], $this->primaryKey);
		message("quiz deleted!");
		redirect('admin/quizzes');
	}
}
