<?php

namespace Controllers;

/**
* 
*/
class Pet extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('pet/index');
	}

	public function another(string $test, string $test2, string $test3)
	{
		echo $test.'<br>';
		echo $test2.'<br>';
		echo $test3;exit;
	}
}