<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

class Content
{
	use MainController;
	
	public function index()
	{
		$this->view('content');
	}
}
