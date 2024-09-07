<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Request;
use \Core\Session;

/**
 * User class
 */
class User
{ 
	use MainController;

	public function index($id = null)
	{
		$ses = new Session;
		
		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin'){
			redirect('home');
		}

		$data['user'] = new \Model\User;
	

		$this->view('admin/user');
	}

}
