<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Subject class
 */
class Subject
{
	use Model;
	use \Controller\MainController;

	protected $table = 'subjects';
	protected $primaryKey = 'subject_id';
	protected $uniqueColumn = 'subject_name';

	protected $allowedColumns = [
		'subject_title',
		'subject_id',
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

		'subject_title' => [
			'alpha_space',
			'required',
			'unique',
		],
		'subject_id' => [
			'unique',
			'required',
		],
	];

	protected $onUpdateValidationRules = [

		'subject_title' => [
			'alpha_space',
			'required',
			'unique',
		],
		'subject_id' => [
			'required',
		],
	];

	public function allRecords() {
		return $this->findAll();
	}

	// function for self subject sign up
	public function add($data)
	{
		if ($this->validate($data)) {
			//add extra subject columns here
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['subject_title'] = ucwords($data['subject_title']);
			
			$code = new Code();
			$data['subject_id'] = $code->uuid_v4();

			$this->insert($data);
			redirect('admin/subjects');
		}
	}

	// function for admin to edit subject record
	public function edit($data)
	{
		if ($this->validate($data)) {

			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['subject_title'] = ucwords($data['subject_title']);

			$this->update($data['subject_id'], $data, $this->primaryKey);
			message("subject account updated!");

			redirect("admin/subject/{$data['subject_id']}");
			
		}
	}

	// function for admin to delete subject record 
	public function del($data)
	{
		$this->delete($data['subject_id'], $this->primaryKey);
		message("subject account deleted!");
		redirect('admin/subjects');
	}
}
