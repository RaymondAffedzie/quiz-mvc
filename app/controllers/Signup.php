<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Model\User;
use \Core\Request;

/**
 * signup class
 */
class Signup
{
	use MainController;

	public function index()
	{

		$data['user'] = new User;
		$req = new Request;
		
		$data['level'] = new \Model\Level;

		$data['levels'] = $data['level']->allRecords();

		if ($req->posted()) {
			$data['user']->signup($_POST);
		}

		$this->view('signup', $data);
	}
}
