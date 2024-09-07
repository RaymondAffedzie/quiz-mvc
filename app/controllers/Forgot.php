<?php

/**
 * Forgot password class
 */

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Request;
use \Core\Session;
use Model\Forgot as ModelForgot;


class Forgot
{
	use MainController;

	public function index()
	{
		$req = new Request;
		$ses = new Session;
		$data['forgot'] = new ModelForgot;

		if ($ses->is_logged_in()) {
			redirect('home');
		}

		$action = $data['action'] = URL(1) ?? 'forgot';

		switch ($action) {

			case 'new-password':
				# code...

				if (!isset($ses->get('forgot')['code'])) {
					redirect('forgot');die;
				}

				if ($req->posted()) {
					$data['forgot']->new_password($_POST);
				}

				break;

			case 'verify':
				# code...

				if (!($ses->get('forgot')['user_id'])) {
					redirect('forgot');die;
				}

				if ($req->posted()) {
					$data['forgot']->verify($_POST);
				}

				break;

			default:
				# code...

				if ($req->posted()) {
					$data['forgot']->find_account($_POST);
				}

				break;
		}

		$this->view('forgot', $data);
	}
}
