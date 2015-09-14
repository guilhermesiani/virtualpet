<?php

namespace Controllers;

use Libs\Session;
use Libs\DAO\DAO;

/**
* 
*/
class Login extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function run()
	{
		$pet = DAO::on('Pet')->findById(1);
	    Session::set('pet', $pet);	
	    header('Location: '.URL.'pet/index');	
	}
}