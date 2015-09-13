<?php

namespace Controllers;

use Libs\Pet\PetFactory\PetFactory as PetFactory;
use Libs\Action as Action;
use Libs\Session as Session;
use Libs\DAO\DAO as DAO;

/**
* 
*/
class Pet extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function index()
	{
		// $pet = DAO::on('Pet')->findById(1);
	 //    Session::set('pet', $pet);

	    $this->view->pet = Session::get('pet', Session::UNSERIALIZE);
		$this->view->render('pet/index');
	}

	public function action(string $do, string $element)
	{
		$action = new Action(Session::get('pet', Session::UNSERIALIZE));
		$action->do($do, $element);
	}
}
