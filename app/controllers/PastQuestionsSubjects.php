<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * pastQuestionsSubjects class
 */
class PastQuestionsSubjects
{
	use MainController;

	public function index()
	{
		$year = URL(1);
		$level_id = URL(2);

		$data['quiz'] = new \Model\Quiz;

		// Fetch available past questions  
		$limit = 24;

		$data['quiz']->limit = $limit;

		$query = "SELECT DISTINCT 
		s.subject_title, s.subject_id, q.quiz_id, l.level_name, l.level_abbreviation, l.level_certificate, c.category_name, c.category_id, q.year_or_form
		FROM quizzes q 
		INNER JOIN subjects s 
		ON q.subject_id = s.subject_id 
		INNER JOIN categories c 
		ON c.category_id = q.category_id 
		INNER JOIN levels l 
		ON l.level_id = q.level_id 
		WHERE q.year_or_form = :year_or_form && q.level_id = :level_id
		ORDER BY 
		s.subject_title ASC";

		$data['rows'] = $data['quiz']->query($query, ['year_or_form' => $year, 'level_id' => $level_id]);

		$this->view('pastQuestionsSubjects', $data);
	}
}
