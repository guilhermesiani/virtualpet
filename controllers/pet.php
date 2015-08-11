<?php

namespace Controllers;

use Libs\Pet\MartianPet\MartianPet as MartianPet;
use Libs\Pet\MartianPet\MartianFlyingPet as MartianFlyingPet;

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
		$pet = new MartianPet('Dolly', new MartianFlyingPet);

		echo "<br>Tenho apenas {$pet->getAge()} ano de vida";

		// $this->view->render('pet/index');
	}

	public function another(string $test, string $test2, string $test3)
	{
		echo $test.'<br>';
		echo $test2.'<br>';
		echo $test3;exit;
	}
}