<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * about class
 */
class About
{
	use MainController;

	public function index()
	{
		$this->view('about');
	}

}
