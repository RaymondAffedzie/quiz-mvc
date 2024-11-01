<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * quiz class
 */
class Quiz
{
	use MainController;

	public function index($id)
	{

		$quiz_id = $id;

		$limit = 1;

		$pager = new \Core\Pager;
		$data['quiz'] = new \Model\Quiz;

		$offset = $pager->offset;

		$data['quiz']->limit = $limit;
		$data['quiz']->offset = $offset;

		// Fetch questions and options for the quiz
		$data['questions'] = $data['quiz']->getQuizQuestionsWithOptions($quiz_id);
		$data['pager'] = $pager;


		$this->view('quiz', $data);
	}
}
