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

		$query = "SELECT s.subject_name, s.subject_id, q.quiz_id 
        FROM quizzes q
        INNER JOIN subjects s ON q.subject_id = s.subject_id
        WHERE q.level_id = :level_id AND q.year_or_form = :year_or_form";

		$data['rows'] = $data['quiz']->query($query);

		$this->view('home', $data);
	}
}
