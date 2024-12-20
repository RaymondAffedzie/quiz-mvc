<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Question class
 */
class Question
{
	use Model;
	use \Controller\MainController;

	protected $table = 'questions';
	protected $primaryKey = 'question_id';
	protected $uniqueColumn = 'question_id';

	protected $allowedColumns = [
		'question_id',
		'quiz_id',
		'question',
		'correct_answer',
		'image',
		'comment',
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

		'file' => [
			'excel',
		],
		'question_id' => [
			'unique',
			'required',
		],
		'quiz_id' => [
			'required',
		],
		'question' => [
			'required',
		],
		'correct_answer' => [
			'required'
		]
	];

	protected $onUpdateValidationRules = [
		'question_id' => [
			'required',
		],
		'question' => [
			'required',
		],
		'quiz_id' => [
			'required',
		],
		'file' => [
			'image',
		]
	];


	public function allRecords()
	{
		return $this->findAll();
	}

	/** funtion for adding questions **/
	public function add_multiple($data)
	{
		if ($this->validate($data)) {
			$excel = new Excel;

			$excel_data = $excel->extract_excel_data($data['file']);

			$this->process_excel_data($excel_data, $data['quiz_id']);

			redirect("admin/quiz/{$data['quiz_id']}");
		}
	}

	// function to edit question
	public function edit($data)
	{
		if ($this->validate($data)) {

			// Check if an image file is uploaded and passed validation
			if (!empty($data['file']['file']['name'])) {
				$folder = 'uploads/';

				// Ensure the uploads folder exists
				if (!file_exists($folder)) {
					mkdir($folder, 0777, true);
					file_put_contents($folder . 'index.php', '');
				}

				$allowedFiles = ['image/jpeg', 'image/png', 'image/webp'];

				// Check the file type
				if (in_array($data['file']['file']['type'], $allowedFiles)) {
					$filename = time() . '_' . basename($data['file']['file']['name']);
					$filePath = $folder . $filename;

					// Move the uploaded file to the folder
					if (move_uploaded_file($data['file']['file']['tmp_name'], $filePath)) {

						// Resize the image if necessary
						$image = new \Model\Image;
						$image->resize($filePath, 1080);

						// Store the filename in the database
						$data['image'] = $filePath;
					}
				}
			}

			// Set the date updated
			$data['date_updated'] = date("Y-m-d H:i:s");

			// Update the question
			$this->update($data['question_id'], $data, $this->primaryKey);

			// Update the options
			$optionModel = new Option();
			foreach ($data['option_id'] as $index => $option_id) {
				$optionData = [
					'option_id' => $option_id,
					'question_id' => $data['question_id'],
					'question_option' => $data['option'][$index],
				];

				// Update each option
				$optionModel->edit($optionData);
			}

			// Success message
			message("Question and options updated!");
		}
	}

	public function del($data)
	{
		if ($this->validate($data)) {

			$optionModel = new \Model\Option();

			// delete multiple options at once using a batch query
			if (isset($data['option_id'])) {
				$optionIds = is_array($data['option_id']) ? $data['option_id'] : [$data['option_id']];
				$optionModel->deleteBatch($optionIds);
			}

			// Delete the question
			if (isset($data['question_id'])) {
				$this->delete($data['question_id'], $this->primaryKey);
			}

			// success message and redirect
			message("Question and its associated options deleted!");
			redirect("admin/quiz/questions/{$data['quiz_id']}");
		}
	}

	/** function for processing multiple questions insertion **/
	private function process_excel_data($rows, $quiz_id)
	{
		$errors = [];
		$successCount = 0;
		$optionModel = new Option();

		/** Process the rows and insert into the database **/
		foreach ($rows as $index => $row) {

			/** Skip the first row (header) **/
			if ($index === 0) {
				continue;
			}

			/** Map excel columns to database data **/
			$rowData = [
				'quiz_id' => $quiz_id,
				'question' => ucfirst($row[0]),
				'correct_answer' => ucfirst($row[1]),
				'comment' => ucfirst($row[6]),
				'date_created' => date("Y-m-d H:i:s"),
				'date_updated' => date("Y-m-d H:i:s")
			];

			/** Validate each row data **/
			if ($this->validate($rowData)) {

				/** Generate question ID  **/
				$code = new Code();
				$rowData['question_id'] = $code->uuid_v4();

				/** Insert the question details into the database **/
				$this->insert($rowData);

				/** Insert options for the question **/
				$options = [$row[2], $row[3], $row[4], $row[5]];

				foreach ($options as $option) {
					if (!empty($option)) {
						// Prepare option data
						$optionData = [
							'question_id' => $rowData['question_id'],
							'question_option' => ucfirst($option)
						];

						// Insert the question options using the Option class
						if (!$optionModel->add($optionData)) {
							$errors[$index + 1] = 'Error inserting option: ' . $option;
							break 2; // Break the outer loop on error
						}
					}
				}

				$successCount++;
			} else {

				/** Collect errors and stop processing on first error **/
				$errors[$index + 1] = $this->errors;
				break;
			}
		}

		if (empty($errors)) {

			/** Success message **/
			message("{$successCount} question(s) added successfully!");
		} else {

			/** Handle errors (messages)**/
			$errorMessages = "";
			foreach ($errors as $row => $errorArray) {

				$formattedErrors = array_map(function ($error) {
					return formatFieldName($error);
					
				}, $errorArray);

				$errorMessages .= "Error in row $row: " . implode(", ", $formattedErrors) . ". ";
			}

			message($errorMessages);
		}
	}
}
