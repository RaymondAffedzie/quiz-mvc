<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Main Model trait
 */
trait Model
{
	use Database;

	public $limit 		= 10;
	public $offset 		= 0;
	public $order_type 	= "desc";
	public $order_column = "date_created";
	public $errors 		= [];

	public function findAll()
	{

		$query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		return $this->query($query);
	}

	public function where($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " && ";
		}

		$query = trim($query, " && ");

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		return $this->query($query, $data);
	}

	public function first($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " && ";
		}

		$query = trim($query, " && ");

		$query .= " limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		$result = $this->query($query, $data);

		if ($result)
			return $result[0];

		return false;
	}

	public function insert($data)
	{

		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
		// echo $query .' <br><br> '. json_encode($data);die;
		$this->query($query, $data);
		return false;
	}

	public function update($id, $data, $id_column = 'id')
	{

		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update $this->table set ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . ", ";
		}

		$query = trim($query, ", ");

		$query .= " where $id_column = :$id_column ";

		$data[$id_column] = $id;

		$this->query($query, $data);
		return false;
	}

	public function delete($id, $id_column = 'id')
	{

		$data[$id_column] = $id;
		$query = "delete from $this->table where $id_column = :$id_column ";
		$this->query($query, $data);

		return false;
	}

	public function getError($key)
	{
		if (!empty($this->errors[$key]))
			return $this->errors[$key];

		return "";
	}

	protected function getPrimaryKey()
	{
		return $this->primaryKey ?? 'id';
	}

	/** validate form data **/
	public function validate($data)
	{
		$this->errors = [];

		if (!empty($this->primaryKey) && !empty($data[$this->primaryKey])) {
			$validationRules = $this->onUpdateValidationRules;
		} else {

			$validationRules = $this->onInsertValidationRules;
		}

		if (!empty($validationRules)) {
			foreach ($validationRules as $column => $rules) {

				if (!isset($data[$column]))
					continue;

				foreach ($rules as $rule) {

					switch ($rule) {
						case 'match':
							if ($column == 'confirm_password' && $data['new_password'] !== $data['confirm_password'])
								$this->errors[$column] = "New password and Confirm Password do not match";

							break;

						case 'accept':
							if ($column === 'terms' && $data[$column] !== 'accepted')
								$this->errors[$column] = "You must accept our " . $column;

							break;

						case 'required':

							if (empty($data[$column]))
								$this->errors[$column] = ucfirst($column) . " is required";

							break;

						case 'password':

							/** checks if user password match old password **/
							$query = "SELECT password FROM users WHERE user_id = :user_id";
							$row = $this->query($query, ['user_id' => $data['user_id']]);

							if (!password_verify($_POST['verify_password'], $row[0]->password)) {
								$this->errors[$column] = "You entered a wrong password";
							}

							break;

						case 'email':

							if (!filter_var(trim($data[$column]), FILTER_VALIDATE_EMAIL))
								$this->errors[$column] = "Invalid email address";

							break;

						case 'image':

							// Image validation logic
							if (isset($data[$column]['file']) && $data[$column]['file']['error'] === 0) {

								$file = $data[$column]['file'];
								$allowedExtensions = ['jpeg', 'jpg', 'png', 'webp'];
								$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

								// Check for file extension
								if (!in_array($fileExtension, $allowedExtensions)) {
									$this->errors[$column] = "Invalid file type. Only " . implode(", ", $allowedExtensions) . " files are allowed!";
								}

								// Check for file upload errors
								if ($file['error'] !== UPLOAD_ERR_OK) {
									$this->errors[$column] = "Error uploading the image file.";
								}
							}
							
							break;

						case 'excel':

							if (empty($data[$column]['name'])) {

								$this->errors[$column] = "Select a file";
							} else {

								$file = $data[$column];
								$allowedExtensions = ['csv'];
								$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

								/** Checks for file extension **/
								if (!in_array($fileExtension, $allowedExtensions)) {
									$this->errors[$column] = "Invalid file type, only .csv file is allowed.";
								}

								/** Checks for uploading error**/
								if ($file['error'] !== UPLOAD_ERR_OK) {
									$this->errors[$column] = "Error uploading the file.";
								}
							}

							break;

						case 'docs':

							if (empty($data[$column]['name'])) {

								$this->errors[$column] = "Select a file";
							} else {

								$file = $data[$column];
								$allowedExtensions = ['pdf'];
								$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

								if (!in_array($fileExtension, $allowedExtensions)) {

									$this->errors[$column] = "Invalid file type, only  .pdf file is allowed.";
								}
							}

							break;

						case 'alpha':

							if (!preg_match("/^[a-zA-Z]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters without spaces";

							break;

						case 'alpha_space':

							if (!preg_match("/^[a-zA-Z ]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & spaces";

							break;

						case 'alpha_numeric_space':

							if (!preg_match("/^[a-zA-Z0-9 ]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters, numbers or spaces";

							break;

						case 'alpha_numeric':

							if (!preg_match("/^[a-zA-Z0-9]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & numbers";

							break;

						case 'numeric':

							if (!preg_match("/^[0-9]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have numbers";

							break;

						case 'alpha_numeric_symbol':

							if (!preg_match("/^[a-zA-Z0-9\-\_\$\%\*\[\]\(\)\&\'\:\;\-\!\ ]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters, symbols, numbers & spaces";

							break;

						case 'alpha_symbol':

							if (!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\&\.\?\=\#\@\!\ ]+$/", trim($data[$column])))
								$this->errors[$column] = ucfirst($column) . " should only have aphabetical letters, space & symbols";

							break;

						case 'not_less_than_8_chars':

							if (strlen(trim($data[$column])) < 8)
								$this->errors[$column] = ucfirst($column) . " should not be less than 8 characters";

							break;

						case 'unique':

							$key = $this->getPrimaryKey();
							if (!empty($data[$key])) {
								//edit mode
								if ($this->first([$column => $data[$column]], [$key => $data[$key]])) {
									$this->errors[$column] = ucfirst($column) . " should be unique";
								}
							} else {
								//insert mode
								if ($this->first([$column => $data[$column]])) {
									$this->errors[$column] = ucfirst($column) . " should be unique";
								}
							}

							break;

						default:
							$this->errors['rules'] = "The rule " . $rule . " was not found!";

							break;
					}
				}
			}
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
