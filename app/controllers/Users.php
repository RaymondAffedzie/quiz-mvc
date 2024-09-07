<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Request;
use \Core\Session;
use \Core\Pager;

/**
 * Users class
 */
class Users
{ 
	use MainController;

	public function index()
	{
		$ses = new Session;
		
		if (!$ses->is_logged_in()) {
			redirect('login');
		} elseif ($ses->is_logged_in() && $ses->user('role') !== 'admin'){
			redirect('home');
		}	
	}

}
