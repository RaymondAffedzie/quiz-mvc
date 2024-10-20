<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * contact class
 */
class Contact
{
	use MainController;

	public function index()
	{
		$this->view('contact');
	}

}
