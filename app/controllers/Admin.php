<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Request;
use \Core\Session;
use \Core\Pager;
use Model\Model;

/**
 * Admin class
 */

class Admin
{
	use MainController;

	public function index()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$this->view('admin/dashboard');
	}

	public function profile()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'user';

		$data['user'] = new \Model\User;
		$data['level'] = new \Model\Level;

		
		if ($action === 'edit') {
			
			$data['row'] = $data['user']->first(['user_id' => $ses->user('user_id')]);
			$data['levels'] = $data['level']->allRecords();

			$req = new Request;
			if ($req->posted()) {
				$data['user']->edit($_POST);
			}
		} elseif ($action === 'change-password') {

			$query = "SELECT first_name, last_name, contact, email FROM users WHERE user_id = :user_id";
			$data['row'] = $data['user']->query($query, ['user_id' => $ses->user('user_id')]);

			$req = new Request;
			if ($req->posted()) {

				$_POST['user_id'] = $ses->user('user_id');
				$data['user']->change_password($_POST);
			}
		} else {

			$data['row'] = $data['user']->first(['user_id' => $ses->user('user_id')]);
		}

		$this->view('admin/profile', $data);
	}

	public function users()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'users';

		$data['user'] = new \Model\User;
		$req = new Request;

		// Add user
		if ($action === 'add') {
			$data['level'] = new \Model\Level;

			$data['levels'] = $data['level']->allRecords();

			if ($req->posted()) {
				$data['user']->add($_POST);
			}

		} elseif ($action === 'upload-file') {

			if ($req->posted()) {
				$data['user']->add_multiple($_FILES, $_POST);
			}
			
		} else {
			// Fetch users 
			$limit = 25;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['user']->limit = $limit;
			$data['user']->offset = $offset;

			$data['rows'] = $data['user']->where([], ['user_id' => $ses->user('user_id')]);

			$data['pager'] = $pager;
		}

		$this->view('admin/users', $data);
	}

	public function user($id = null)
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$req = new Request;
		$action = $data['action'] = URL(2) ?? 'users';

		$data['user'] = new \Model\User;
		$data['level'] = new \Model\Level;

		$user_id = URL(3);

		if ($action === 'edit') {

			$query = "SELECT u.user_id, u.first_name, u.last_name, u.role, u.email, u.contact, u.school_name, l.level_name, l.level_id FROM users u LEFT JOIN levels l ON u.level_id = l.level_id WHERE u.user_id = :user_id limit 1";
			$data['row'] = $data['user']->query($query, ['user_id' => $user_id]);
			$data['levels'] = $data['level']->allRecords();

			if ($req->posted()) {
				$data['user']->edit($_POST);
			}
		} elseif ($action === 'delete') {

			$query = "SELECT u.user_id, u.first_name, u.last_name, u.role, u.email, u.contact, u.school_name, l.level_name, l.level_id FROM users u LEFT JOIN levels l ON u.level_id = l.level_id WHERE u.user_id = :user_id limit 1";
			$data['row'] = $data['user']->query($query, ['user_id' => $user_id]);

			if ($req->posted()) {
				$data['user']->del($_POST);
			}
		} else {

			$query = "SELECT u.user_id, u.first_name, u.last_name, u.role, u.email, u.contact, u.school_name, l.level_name, l.level_id FROM users u LEFT JOIN levels l ON u.level_id = l.level_id WHERE u.user_id = :user_id limit 1";
			$data['row'] = $data['user']->query($query, ['user_id' => $id]);
		}

		$this->view('admin/user', $data);
	}

	public function levels()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'Levels';

		$data['level'] = new \Model\Level;
		$req = new Request;

		// Add Level
		if ($action === 'add') {
			if ($req->posted()) {
				$data['level']->add($_POST);
			}
		} else {
			// Fetch levels 
			$limit = 5;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['level']->limit = $limit;
			$data['level']->offset = $offset;

			$data['rows'] = $data['level']->findAll();

			$data['pager'] = $pager;
		}

		$this->view('admin/levels', $data);
	}

	public function level($id = null)
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$req = new Request;
		$action = $data['action'] = URL(2) ?? 'levels';

		$data['level'] = new \Model\Level;

		$level_id = URL(3);

		if ($action === 'edit') {

			$data['row'] = $data['level']->first(['level_id' => $level_id]);

			if ($req->posted()) {
				$data['level']->edit($_POST);
			}
		} elseif ($action === 'delete') {

			$data['row'] = $data['level']->first(['level_id' => $level_id]);

			if ($req->posted()) {
				$data['level']->del($_POST);
			}
		} else {

			$data['row'] = $data['level']->first(['level_id' => $id]);
		}

		$this->view('admin/level', $data);
	}

	public function categories()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'Categories';

		$data['category'] = new \Model\Category;
		$req = new Request;

		// Add Category
		if ($action === 'add') {
			if ($req->posted()) {
				$data['category']->add($_POST);
			}
		} else {
			// Fetch categories 
			$limit = 5;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['category']->limit = $limit;
			$data['category']->offset = $offset;

			$data['rows'] = $data['category']->findAll();

			$data['pager'] = $pager;
		}

		$this->view('admin/categories', $data);
	}

	public function category($id = null)
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$req = new Request;
		$action = $data['action'] = URL(2) ?? 'categories';

		$data['category'] = new \Model\Category;

		$category_id = URL(3);

		if ($action === 'edit') {

			$data['row'] = $data['category']->first(['category_id' => $category_id]);

			if ($req->posted()) {
				$data['category']->edit($_POST);
			}
		} elseif ($action === 'delete') {

			$data['row'] = $data['category']->first(['category_id' => $category_id]);

			if ($req->posted()) {
				$data['category']->del($_POST);
			}
		} else {

			$data['row'] = $data['category']->first(['category_id' => $id]);
		}

		$this->view('admin/category', $data);
	}

	public function subjects()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'Subjects';

		$data['subject'] = new \Model\Subject;
		$req = new Request;

		// Add Subject
		if ($action === 'add') {
			if ($req->posted()) {
				$data['subject']->add($_POST);
			}
		} else {
			// Fetch Subjects 
			$limit = 5;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['subject']->limit = $limit;
			$data['subject']->offset = $offset;

			$data['rows'] = $data['subject']->findAll();

			$data['pager'] = $pager;
		}

		$this->view('admin/subjects', $data);
	}

	public function subject($id = null)
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$req = new Request;
		$action = $data['action'] = URL(2) ?? 'Subject';

		$data['subject'] = new \Model\Subject;

		$subject_id = URL(3);

		if ($action === 'edit') {

			$data['row'] = $data['subject']->first(['subject_id' => $subject_id]);

			if ($req->posted()) {
				$data['subject']->edit($_POST);
			}
		} elseif ($action === 'delete') {

			$data['row'] = $data['subject']->first(['subject_id' => $subject_id]);

			if ($req->posted()) {
				$data['subject']->del($_POST);
			}
		} else {

			$data['row'] = $data['subject']->first(['subject_id' => $id]);
		}

		$this->view('admin/subject', $data);
	}

	public function quizzes()
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$action = $data['action'] = URL(2) ?? 'Quizzes';

		$data['quiz'] = new \Model\Quiz;

		$req = new Request;

		// Add Quiz
		if ($action === 'add') {

			$data['level'] = new \Model\Level;
			$data['category'] = new \Model\Category;
			$data['subject'] = new \Model\Subject;

			$data['levels'] = $data['level']->allRecords();
			$data['categories'] = $data['category']->allRecords();
			$data['subjects'] = $data['subject']->allRecords();

			if ($req->posted()) {

				$data['old'] = $data['quiz']->first($_POST);

				if ($data['old'] == false) {

					$data['quiz']->add($_POST);
				} else {
					message("A quiz with the same details already exist");
				}
			}
		} elseif ($action === 'upload-questions') {

			if ($req->posted()) {
				$data['user']->add_multiple($_FILES, $_POST);
			}
			
		} else {
			// Fetch quizzes 
			$limit = 25;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['quiz']->limit = $limit;
			$data['quiz']->offset = $offset;

			$query = "SELECT c.category_name, s.subject_title, l.level_name, q.quiz_id, q.year_or_form FROM quizzes q INNER JOIN categories c ON c.category_id = q.category_id INNER JOIN subjects s ON s.subject_id = q.subject_id INNER JOIN levels l ON l.level_id = q.level_id ORDER BY c.category_name ASC, l.level_name ASC, s.subject_title ASC, q.year_or_form DESC";
			$data['rows'] = $data['quiz']->query($query);

			$data['pager'] = $pager;
		}

		$this->view('admin/quizzes', $data);
	}

	public function quiz($id = null)
	{
		$ses = new Session;

		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin') {
			redirect('home');
		}

		$req = new Request;
		$action = $data['action'] = URL(2) ?? 'Quiz';

		$data['quiz'] = new \Model\Quiz;
		$data['level'] = new \Model\Level;
		$data['category'] = new \Model\Category;
		$data['subject'] = new \Model\Subject;
		$data['question'] = new \Model\Question;
		$data['option'] = new \Model\Option;

		$quiz_id = URL(3);

		if ($action === 'add-questions') {  // questions to a quiz

			/** fetch quiz detials **/
			$data['row'] = $data['quiz']->first(['quiz_id' => $quiz_id]);

			if ($req->posted()) {
				$data['question']->add_multiple($_FILES, $_POST);
			}

		} elseif ($action === 'questions') { // fetch all questions from a quiz

			$limit = 10;
			$pager = new Pager($limit);
			$offset = $pager->offset;

			$data['question']->limit = $limit;
			$data['question']->offset = $offset;

			$data['rows'] = $data['question']->where(['quiz_id' => $quiz_id]);		
			$data['pager'] = $pager;

		} elseif ($action === 'question-details') {  // Question detail

			$question_id = URL(3);
			$_POST['question_id'] = $question_id;

			if ($req->posted()) {
				$data['question']->edit($_POST);
			}

			/** fetch question and option detials **/
			$data['row_question'] = $data['question']->where(['question_id' => $question_id]);		
			$data['row_options'] = $data['option']->where(['question_id' => $question_id]);	

		} elseif ($action === 'delete-question') {  // delete Question 

			$question_id = URL(3);
			$_POST['question_id'] = $question_id;

			if ($req->posted()) {
				$data['question']->del($_POST);
			}

			/** fetch question and option detials **/
			$data['row_question'] = $data['question']->where(['question_id' => $question_id]);		
			$data['row_options'] = $data['option']->where(['question_id' => $question_id]);		

		} elseif ($action === 'edit') {  // edit a quiz 

			if ($req->posted()) {

				$data['new_quiz'] = new \Model\Quiz;
				$data['new_quiz']->limit = 1;

				/** finds existing quiz details  **/
				$find = $_POST;
				unset($find['quiz_id']);
				$data['old'] = $data['new_quiz']->first($find);

				/** update the quiz details if there is no matching details  **/
				if ($data['old'] == false) {

					$data['quiz']->edit($_POST);
				} else {
					/** no matching details found **/
					message("A quiz with the same details already exist");
				}
			}

			/** fetch quiz detials **/
			$data['row'] = $data['quiz']->first(['quiz_id' => $quiz_id]);

			$data['categories'] = $data['category']->allRecords();
			$data['levels'] = $data['level']->allRecords();
			$data['subjects'] = $data['subject']->allRecords();

		} elseif ($action === 'delete') {

			/** delete quiz details **/
			if ($req->posted()) {
				$data['quiz']->del($_POST);
			}

			$data['categories'] = $data['category']->allRecords();
			$data['levels'] = $data['level']->allRecords();
			$data['subjects'] = $data['subject']->allRecords();

			$data['row'] = $data['quiz']->first(['quiz_id' => $quiz_id]);

		} else {

			/** fetch quiz information **/
			$query = "SELECT c.category_name, l.level_name, s.subject_title, q.year_or_form, q.quiz_id FROM quizzes q INNER JOIN categories c ON c.category_id = q.category_id INNER JOIN levels l ON l.level_id = q.level_id INNER JOIN subjects s ON s.subject_id = q.subject_id WHERE q.quiz_id = :quiz_id";
			$data['row'] = $data['quiz']->query($query, ['quiz_id' => $id]);
		}

		$this->view('admin/quiz', $data);
	}
}
