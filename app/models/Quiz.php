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

	public function allRecords()
	{
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

	public function del($data)
	{
		if ($this->validate($data)) {

			$quiz_id = $data['quiz_id'];

			// Get all questions related to this quiz
			$questionModel = new Question();
			$questions = $questionModel->where(['quiz_id' => $quiz_id]);

			if ($questions && is_array($questions)) {
				
				$optionModel = new Option();
				
				// Loop through each question and delete its options and the question itself
				foreach ($questions as $question) {
					
					$question_id = $question->question_id; 

					// Delete all options for this question
					$options = $optionModel->where(['question_id' => $question_id]);

					if ($options && is_array($options)) { 

						$option_ids = array_column($options, 'option_id');

						if (!empty($option_ids)) {
							$optionModel->deleteBatch($option_ids); // Delete options using batch deletion
						}
					}

					// delete the question after options have been deleted
					$questionModel->delete($question_id, 'question_id');
				}
			}

			// Delete the quiz after all related questions and options have been deleted
			$this->delete($quiz_id, 'quiz_id');

			// success message and redirect
			message("Quiz and all related questions and options have been deleted!");
			redirect("admin/quizzes");
		}
	}
}
