<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * User class
 */
class User
{
	use Model;
	use \Controller\MainController;

	protected $table = 'users';
	protected $primaryKey = 'user_id';
	protected $loginUniqueColumn = 'email';

	protected $allowedColumns = [
		'level_id',
		'contact',
		'email',
		'password',
		'first_name',
		'last_name',
		'role',
		'school_name',
		'user_id',
		'date_created',
		'date_updated',
		'terms'
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

		'email' => [
			'email',
			'unique',
			'required',
		],
		'contact' => [
			'unique',
			'numeric',
			'required',
		],
		'first_name' => [
			'alpha_symbol',
			'required',
		],
		'last_name' => [
			'alpha_symbol',
			'required',
		],
		'school_name' => [
			'alpha_symbol',
			'required',
		],
		'new_password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
		'confirm_password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
		'terms' => [
			'accept',
			'required',
		],
		'role' => [
			'required',
		],
		'level_id' => [
			'required',
		],
	];

	protected $onUpdateValidationRules = [

		'email' => [
			'email',
			'unique',
			'required',
		],
		'contact' => [
			'unique',
			'numeric',
		],
		'first_name' => [
			'alpha_symbol',
			'required',
		],
		'last_name' => [
			'alpha_symbol',
			'required',
		],
		'school_name' => [
			'alpha_symbol',
		],
		'password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
		'verify_password' => [
			'password',
			'required',
		],
		'new_password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
		'confirm_password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
		'level_id' => [
			'required',
		],
	];

	public function allRecords()
	{
		return $this->findAll();
	}

	// function for self user sign up
	public function signup($data)
	{
		if ($this->validate($data)) {

			//add extra user columns here
			$data['password'] = password_hash($data['new_password'], PASSWORD_BCRYPT);
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['first_name'] = ucwords($data['first_name']);
			$data['last_name'] = ucwords($data['last_name']);
			$data['email'] = strtolower($data['email']);
			$data['school_name'] = ucwords($data['school_name']);
			$data['terms'] = ucfirst($data['terms']);

			// generate unique ID for the user account
			$code = new Code();
			$data['user_id'] = $code->uuid_v4();

			// add record to the database
			$this->insert($data);

			// send email to user after sigingup
			$email = new Email;
			$subject = 'Registration Successful';
			$message = "Your account at <a href=" . ROOT . ">" . APP_NAME . "</a> has been created successfully. <br>Thanks";
			$email->send_message($data['email'], $subject, $message);

			// redirect to the login page
			redirect('login');
		}
	}

	// function for user login
	public function login($data)
	{
		$row = $this->first([$this->loginUniqueColumn => $data[$this->loginUniqueColumn]]);

		if ($row) {
			//confirm password
			if (password_verify($data['password'], $row->password)) {

				$ses = new \Core\Session;
				$ses->auth($row);

				switch ($row->role) {

					case 'admin':
						redirect('admin/');
						break;

					case 'student':
						redirect('home');
						break;

					case 'teacher':
						redirect('home');
						break;

					default:
						redirect('home');
						break;
				}
			} else {

				$this->errors[$this->loginUniqueColumn] = "Wrong $this->loginUniqueColumn or password";
			}
		} else {
			$this->errors[$this->loginUniqueColumn] = "Wrong $this->loginUniqueColumn or password";
		}
	}

	// function for admin to add user
	public function add($data)
	{
		if ($this->validate($data)) {

			// generate password for user registered by admin
			$code = new Code();
			$generated_password = $code->mixed_alphanumeric(10);

			// add extra user columns here
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['first_name'] = ucwords($data['first_name']);
			$data['last_name'] = ucwords($data['last_name']);
			$data['role'] = strtolower($data['role']);
			$data['email'] = strtolower($data['email']);
			$data['school_name'] = ucwords($data['school_name']);
			$data['user_id'] = $code->uuid_v4();

			// hash password
			$data['password'] = password_hash($generated_password, PASSWORD_BCRYPT);
			$this->insert($data);

			$email = new Email;
			$subject = APP_NAME . " New Account Registration";
			$message = "Your password is <b> {$generated_password}</b>";
			$email->send_email($data['email'], $subject, $message);

			message("User account created! An email has been sent to {$data['email']}.");
			redirect('admin/users');
		}
	}

	// function for admin to edit user record
	public function edit($data)
	{
		if ($this->validate($data)) {

			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['first_name'] = ucwords($data['first_name']);
			$data['last_name'] = ucwords($data['last_name']);
			$data['role'] = strtolower($data['role']);
			$data['email'] = strtolower($data['email']);
			$data['school_name'] = ucwords($data['school_name']);

			$this->update($data['user_id'], $data, $this->primaryKey);
			message("User account updated!");

			$base = URL(1);
			if ($base == 'profile') {
				redirect("admin/profile");
			} else {
				redirect("admin/user/{$data['user_id']}");
			}
		}
	}

	// function for admin to edit user record
	public function change_password($data)
	{
		if ($this->validate($data)) {

			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['password'] = ucwords($data['verify_password']);

			$this->update($data['user_id'], $data, $this->primaryKey);

			message("Password updated!");

			$base = URL(1);
			if ($base == 'profile') {
				redirect("admin/profile");
			} else {
				redirect("admin/user/{$data['user_id']}");
			}
		}
	}

	// function for admin to delete user record 
	public function del($data)
	{
		$this->delete($data['user_id'], $this->primaryKey);
		message("User account deleted!");
		redirect('admin/users');
	}

	public function add_multiple($upload, $data)
	{
		if ($this->validate($upload)) {
			$excel = new Excel;
			$excel_data = $excel->read_data($upload, $data);
			$this->process_data($excel_data);
			// die;
			redirect('admin/users');
		}
	}

	private function process_data($rows)
	{
		$errors = [];
		$successCount = 0;

		/** Process the rows and insert into the database **/
		foreach ($rows as $index => $row) {

			/** Skip the first row (header) **/
			if ($index === 0) {
				continue;
			}


			$level = '';
			$query = "SELECT level_id FROM levels WHERE level_name = :level_name || level_abbreviation = :level_abbreviation";
			$level = $this->query($query, ['level_name' => $row[5], 'level_abbreviation' => $row[6]]);

			/** Check if level_id was found **/
			if (empty($level)) {

				message('The Level ' . ucwords($row[5] . ' (' . strtoupper($row[6])). ') was not found in our database. Check row ' . $index . ' in your excel file.');
				redirect("admin/users/upload-file");
				break;
			}

			/** Map excel columns to database data **/
			$rowData = [
				'first_name' => ucwords($row[0]),
				'last_name' => ucwords($row[1]),
				'contact' => $row[2],
				'email' => $row[3],
				'school_name' => ucwords($row[4]),
				'level_id' => $level[0]->level_id,
				'role' => 'student',
				'date_created' => date("Y-m-d H:i:s"),
				'date_updated' => date("Y-m-d H:i:s")
			];

			/** Validate each row data **/
			if ($this->validate($rowData)) {

				/** Generate user ID  **/
				$code = new Code();
				$rowData['user_id'] = $code->uuid_v4();

				/** Generate user password **/
				$pass_code = new Code;
				$generated_password = $pass_code->mixed_alphanumeric(10);
				$rowData['password'] = password_hash($generated_password, PASSWORD_BCRYPT);
	 

				/** Insert the data into the database **/
				$this->insert($rowData);

				/** Send the generate password through email to the user **/
				$subject = APP_NAME . ": New Account Registration";
				$message = 'Your password is '.$generated_password.' <br> Login at '. ROOT .'/login';

				$email = new Email;
				$email->send_message($rowData['email'], $subject, $message);

				$successCount++;
			} else {

				/** Collect errors and stop processing on first error **/
				$errors[$index + 1] = $this->errors;
				break;
			}
		}

		if (empty($errors)) {

			/** Success message **/
			message("{$successCount} user(s) account created successfully!");
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
