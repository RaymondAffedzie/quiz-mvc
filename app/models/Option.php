<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Option class
 */
class Option
{
    use Model;
    use \Controller\MainController;

    protected $table = 'options';
    protected $primaryKey = 'option_id';
    protected $loginUniqueColumn = 'option';

    protected $allowedColumns = [
        'option_id',
        'question_id',
        'question_option',
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
     ****************************/

    protected $onInsertValidationRules = [

        'option_id' => [
            'unique',
            'required',
        ],
        'question_id' => [
            'required',
        ],
        'option' => [
            'required',
        ],
    ];

    protected $onUpdateValidationRules = [

        'option_id' => [
            'unique',
            'required',
        ],
        'question_id' => [
            'required',
        ],
        'option' => [
            'required',
        ],
    ];

    public function allRecords()
    {
        return $this->findAll();
    }

    // Function to add question option
    public function add($data)
    {
        if ($this->validate($data)) {

            // Generate unique option ID
            $code = new Code();
            $data['option_id'] = $code->uuid_v4();
            $data['date_created'] = date("Y-m-d H:i:s");
            $data['date_updated'] = date("Y-m-d H:i:s");

            // Insert into the options table
            $this->insert($data);
            return true;
        }
        return false;
    }

    // Function to edit question option
    public function edit($data)
    {
        if ($this->validate($data)) {

            $data['date_updated'] = date("Y-m-d H:i:s");

            $this->update($data['option_id'], $data, $this->primaryKey);
            message("Question and options updated!");
        }
    }

    // Function for admin to delete option record 
    public function del($option_id)
    {
        $this->delete($option_id, $this->primaryKey);
        message("Question and options deleted!");
    }

    // Function for deleting bulk options
    public function deleteBatch($option_ids)
    {
        $placeholders = rtrim(str_repeat('?,', count($option_ids)), ',');
        $query = "DELETE FROM {$this->table} WHERE {$this->primaryKey} IN ($placeholders)";
        $this->query($query, $option_ids);
    }
}
