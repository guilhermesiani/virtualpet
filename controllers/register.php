<?php

namespace Controllers;

use Libs\Session as Session;

/**
* 
*/
class Register extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function stepOne()
	{
		$this->view->render('register/step_one');
	}

	public function stepTwo()
	{
		// Session::set('username', $_POST['username']);
		// Session::set('email', $_POST['email']);
		// Session::set('password', $_POST['password']);

		$this->view->render('register/step_two');
	}	

	public function stepThree()
	{
		// Session::set('planet', $_POST['planet']);

		$this->view->render('register/step_three');
	}

	public function save()
	{
		header('Location: '.URL.'pet/index');
	}	
}