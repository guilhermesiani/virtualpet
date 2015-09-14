<?php

namespace Controllers;

use Libs\Session as Session;
use Libs\PetOwner\PetOwner as PetOwner;
use Libs\Pet\PetFactory\PetFactory as PetFactory;
use Libs\DAO\DAO as DAO;

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
		Session::set('username', $_POST['username']);
		Session::set('email', $_POST['email']);
		Session::set('password', \Libs\Password::create($_POST['password']));

		$this->view->render('register/step_two');
	}	

	public function stepThree()
	{
		Session::set('planet', $_POST['planet']);

		$this->view->render('register/step_three');
	}

	public function save()
	{
		$petOwner = new PetOwner();
		$petOwner->setUsername(Session::get('username'));
		$petOwner->setEmail(Session::get('email'));
		$petOwner->setPassword(Session::get('password'));

		$petFactory = new PetFactory(Session::get('planet'), $_POST['kind']);
		$pet = $petFactory->createPet();

		// Usar transação
		DAO::on('PetOwner')->save($petOwner);
		// DAO::on('Pet')->insert($pet);

		header('Location: '.URL.'login/run');
	}	
}
