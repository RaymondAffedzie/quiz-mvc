<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\User;
use \Core\Request;

/**
 * login class
 */
class Login
{
	use MainController;

	public function index()
	{

		$data['user'] = new User;
		$req = new Request;
		if($req->posted())
		{
			$data['user']->login($_POST);
		}

		$this->view('login',$data);
	}

}
