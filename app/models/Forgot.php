<?php

/**
 * Forgot password class
 */

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

use Core\Session;

class Forgot
{
	use Model;
	use \Controller\MainController;

	protected $table = 'forgot';
	protected $primaryKey = 'forgot_id';
	protected $uniqueColumn = 'email';

	protected $allowedColumns = [
		'forgot_id',
		'user_id',
		'code',
		'expire',
		'date_created',
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
			'required',
		],

		'code' => [
			'numeric',
			'required',
		],

		'password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],

		'confirm_password' => [
			'not_less_than_8_chars',
			'match',
			'required',
		],
	];

	// function for finding users account
	public function find_account($data)
	{
		if ($this->validate($data)) {

			$query = "SELECT user_id FROM users WHERE email = :email LIMIT 1";

			$row = $this->query($query, ['email' => $data['email']]);

			if ($row) {

				// initiate user's email into session variable
				$ses = new Session;
				$ses->set(['forgot' => ['user_id' => $row[0]->user_id]]);

				// save and send verification code the user
				$this->save_code($row[0]->user_id, $data['email']);

				// redirect the user to the verification page
				redirect('forgot/verify');
			} else {

				$this->errors[$this->uniqueColumn] = "Account not found!";
			}
		}
	}

	// function for verifing code
	public function verify($data)
	{
		$ses = new Session;

		if (!isset($ses->get('forgot')['user_id'])) {
			redirect('forgot');
			die;
		}

		if ($this->validate($data)) {

			$data['user_id'] = $ses->get('forgot')['user_id'];

			$query = "SELECT * FROM forgot WHERE code = :code AND user_id = :user_id ORDER BY date_created DESC LIMIT 1";

			$row = $this->query($query, ['user_id' => $data['user_id'], 'code' => $data['code']]);

			if ($row) {

				$current_time = time();

				if ($row[0]->expire > $current_time) {
					# code...

					$ses->set(['forgot' => ['code' => $data['code']]]);

					redirect('forgot/new-password');
				} else {

					$this->errors['code'] = "The code has expired!";
				}
			} else {

				$this->errors['code'] = "The code is incorrect!";
			}
		}
	}

	// function to update password
	public function new_password($data)
	{
		$ses = new Session;

		// prevent user from accessing the verification code page if account has not been initiated for password change
		if (!isset($ses->get('forgot')['code'])) {
			redirect('forgot');
			die;
		}

		if ($this->validate($data)) {

			//add extra user columns here
			$data['password'] = password_hash($data['new_password'], PASSWORD_BCRYPT);
			$data['user_id'] = $ses->get('forgot')['user_id'];
			$data['date_updated'] = date("Y-m-d H:i:s");

			// update users password
			$query = "UPDATE users SET password = :password WHERE user_id = :user_id LIMIT 1";
			$this->query($query, ['user_id' => $data['user_id'], 'password' => $data['password']]);

			// get user's email address
			$queryEmail = "SELECT email FROM users WHERE user_id = :user_id LIMIT 1";
			$rowEmail = $this->query($queryEmail, ['user_id' => $data['user_id']]);
			
			// email content to be sent
			$userEmail = $rowEmail[0]->email;
			$subject = 'Password Reset: Success';
			$message = "You have successfully changed your password. Go to " . ROOT . "/login to sign in.<br><br>Thank you";

			// send account creation email to the user
			$email = new Email;
			$email->send_message($userEmail, $subject, $message);
			

			// remove or destroy forgot password session variables and values
			if (!empty($_SESSION['APP']['forgot'])) {
				unset($_SESSION['APP']['forgot']);
			}

			// redirect the user to the login page
			redirect('login');
		}
	}

	// function to save validation code
	private function save_code($user_id, $email)
	{
		$code = new \Model\Code;

		$data['forgot_id'] = $code->uuid_v4();
		$data['code'] = $code->OTP();
		$data['user_id'] = $user_id;
		$data['expire'] = time() + (60 * 5);
		$data['date_created'] = date('Y/m/d');

		$this->insert($data);

		// send verification code to the user's email
		$email = new Email;
		$subject = 'Password Reset: Verification Code';
		$message = "You requested a password change. <br> Use this code to verify your account <b>{$data['code']}</b>. <br>The code will expire at <b>" . get_time($data['expire']) . "</b>.";

		$email->send_message($email, $subject, $message);
	}

}
