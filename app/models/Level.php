<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Level class
 */
class Level
{
	use Model;
	use \Controller\MainController;

	protected $table = 'levels';
	protected $primaryKey = 'level_id';
	protected $uniqueColumn = 'level_name';

	protected $allowedColumns = [
		'level_abbreviation',
		'level_certificate',
		'level_name',
		'level_id',
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

		'level_name' => [
			'alpha_space',
			'required',
			'unique',
		],
		'level_abbreviation' => [
			'alpha_symbol',
			'required',
			'unique',
		],
		'level_id' => [
			'unique',
			'required',
		],
	];

	protected $onUpdateValidationRules = [

		'level_name' => [
			'alpha_space',
			'required',
			'unique',
		],
		'level_abbreviation' => [
			'alpha_symbol',
			'required',
			'unique',
		],
		'level_id' => [
			'required',
		],
	];

	public function allRecords() {
		return $this->findAll();
	}
	
	// function for self level sign up
	public function add($data)
	{
		if ($this->validate($data)) {
			//add extra level columns here
			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['level_name'] = ucwords($data['level_name']);
			$data['level_abbreviation'] = strtoupper($data['level_abbreviation']);
			
			$code = new Code();
			$data['level_id'] = $code->uuid_v4();

			$this->insert($data);
			redirect('admin/levels');
		}
	}

	// function for admin to edit level record
	public function edit($data)
	{
		if ($this->validate($data)) {

			$data['date_updated'] = date("Y-m-d H:i:s");
			$data['level_name'] = ucwords($data['level_name']);
			$data['level_abbreviation'] = strtoupper($data['level_abbreviation']);

			$this->update($data['level_id'], $data, $this->primaryKey);
			message("level account updated!");

			redirect("admin/level/{$data['level_id']}");
			
		}
	}

	// function for admin to delete level record 
	public function del($data)
	{
		$this->delete($data['level_id'], $this->primaryKey);
		message("Level account deleted!");
		redirect('admin/levels');
	}
}
