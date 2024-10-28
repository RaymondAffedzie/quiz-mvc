<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * home class
 */
class Home
{
	use MainController;

	public function index()
	{
		$data['quiz'] = new \Model\Quiz;

		// Fetch available past questions  
		$limit = 24;

		$data['quiz']->limit = $limit;

		$query = "SELECT DISTINCT 
		l.level_id, l.level_name, l.level_abbreviation, l.level_certificate, c.category_id, c.category_name, q.year_or_form 
		FROM quizzes q 
		INNER JOIN categories c 
		ON c.category_id = q.category_id 
		INNER JOIN levels l 
		ON l.level_id = q.level_id 
		ORDER BY 
		c.category_name ASC, 
		l.level_name ASC, 
		q.year_or_form DESC";

		$data['rows'] = $data['quiz']->query($query);

		$this->view('home', $data);
	}
}
