<?php

namespace Controllers;

use Libs\Pet\MartianPet\MartianPet as MartianPet;
use Libs\Pet\MartianPet\MartianFlyingPet as MartianFlyingPet;
use Libs\Action as Action;
use Libs\Session as Session;

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
		$this->model->select();
		$this->view->render('pet/index');
	}

	public function action(string $do, string $element)
	{
		$action = new Action(/* Pet object */);
		$action->do($do, $element);
	}
}