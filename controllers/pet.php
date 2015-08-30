<?php

namespace Controllers;

use Libs\Pet\PetFactory\PetFactory as PetFactory;
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
		Session::init();
	}

	public function index()
	{
		// $petData = $this->model->select();
		// $petFactory = new PetFactory($petData['planet'], $petData['kind']);
		// $pet = $petFactory->createPet();

	 //    $pet->setId($petData['pet_id']);
	 //    $pet->setName('Little Dolly');
	 //    $pet->setAge($petData['age']);
	 //    $pet->setHunger(90);
	 //    $pet->setStress(90);

	 //    if ($petData['alive'] != 1)
	 //    	$pet->die();

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
