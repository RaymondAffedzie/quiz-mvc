<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * category class
 */
class category
{
	use Model;
	use \Controller\MainController;

	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	protected $uniqueColumn = 'category_name';

	protected $allowedColumns = [
		'category_name',
		'category_id',
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

		'category_name' => [
			'alpha_space',
			'required',
			'unique',
		],
		'category_id' => [
			'required',
			'unique',
		],
	];

	protected $onUpdateValidationRules = [

		'category_name' => [
			'alpha_space',
			'required',
			'unique',
		],
		'category_id' => [
			'required',
		],
	];

	public function allRecords() {
		return $this->findAll();
	}

	// function for self category sign up
	public function add($data)
	{
		if ($this->validate($data)) {
			//add extra category columns here
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['category_name'] = ucwords($data['category_name']);
			
			$code = new Code();
			$data['category_id'] = $code->uuid_v4();

			$this->insert($data);

			redirect('admin/categories');
		}
	}

	// function for admin to edit category record
	public function edit($data)
	{
		if ($this->validate($data)) {

			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['category_name'] = ucwords($data['category_name']);

			$this->update($data['category_id'], $data, $this->primaryKey);
			message("category account updated!");

			redirect("admin/category/{$data['category_id']}");
			
		}
	}

	// function for admin to delete category record 
	public function del($data)
	{
		$this->delete($data['category_id'], $this->primaryKey);
		message("Category account deleted!");
		redirect('admin/categories');
	}
}
