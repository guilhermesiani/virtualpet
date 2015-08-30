<?php

namespace Controllers;

use Libs\Pet\MartianPet\MartianPet as MartianPet;
use Libs\Pet\MartianPet\MartianFlyingPet as MartianFlyingPet;
use Libs\Pet\MartianPet\MartianMarinePet as MartianMarinePet;
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
		// $pet_data = $this->model->select();

		// // Criar factory method
		// if ($pet_data['planet'] == 'mars') {
		// 	$petObject = 'Martian';
		// } else if ($pet_data['planet'] == 'earth') {
		// 	$petObject = 'Earth';
		// }

		// if ($pet_data['kind'] == 'flying') {
		// 	$petKindObject = "{$petObject}FlyingPet";
		// } else if ($pet_data['kind'] == 'marine') {
		// 	$petKindObject = "{$petObject}MarinePet";
		// } else if ($pet_data['kind'] == 'terrestrial') {
		// 	$petKindObject = "{$petObject}TerrestrialPet";
		// }

		// $petKindObject 	= "Libs\Pet\\".$petObject."Pet\\".$petKindObject;
		// $petObject 		= "Libs\Pet\\".$petObject."Pet\\".$petObject."Pet";
		
		// $pet = new $petObject('Little Dolly', new $petKindObject);

	 //    $pet->setId($pet_data['pet_id']);
	 //    $pet->setAge($pet_data['age']);
	 //    $pet->setHunger(90);
	 //    $pet->setStress(90);

	 //    if ($pet_data['alive'] != 1)
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
