<?php

namespace Controllers;

use Libs;

/**
*  Index Controller
*/
class Index extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->view->render('index/index');	
	}
}