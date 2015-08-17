<?php

require_once('../simpletest/autorun.php');
require_once('../../libs/Pet/Pet.php');
require_once('../../libs/Pet/AnimalKingdom/AnimalKingdom.php');
require_once('../../libs/Pet/AnimalKingdom/MartianAnimalKingdom.php');
require_once('../../libs/Pet/Specie/Flying.php');
require_once('../../libs/Pet/MartianPet/MartianPet.php');
require_once('../../libs/Pet/MartianPet/MartianFlyingPet.php');

use Libs\Pet\MartianPet\MartianPet as MartianPet;
use Libs\Pet\MartianPet\MartianFlyingPet as MartianFlyingPet;

/**
* 
*/
class TestOfPet extends UnitTestCase
{
	private $pet;

	function __construct() 
	{
		$this->pet = new MartianPet('Test', new MartianFlyingPet);
	}

	public function testConstruct()
	{
		$this->assertIsA($this->pet, 'Libs\Pet\MartianPet\MartianPet');
		$this->assertIsA($this->pet, 'Libs\Pet\Pet');
	}

	public function testSetId()
	{
		$this->pet->setId(2);
		$this->assertIdentical($this->pet->getId(), 2);
	}

	public function testSetName()
	{
		$this->pet->setName('Other name');
		$this->assertIdentical($this->pet->getName(), 'Other name');
	}

	public function testSetAge()
	{
		$this->pet->setAge(3.56);
		$this->assertIdentical($this->pet->getAge(), 3.56);
	}

	public function testSetHunger() 
	{
		$this->pet->setHunger(3);
		$this->assertIdentical($this->pet->getHunger(), 3);
	}

	public function testSetStress() 
	{
		$this->pet->setStress(3);
		$this->assertIdentical($this->pet->getStress(), 3);
	}

	public function testFeed()
	{

	}

	public function testPlay()
	{

	}	

	public function testDie() 
	{
		$this->assertIsA($this->pet->getAlive(), 'bool');
		$this->pet->die();
		$this->assertIsA($this->pet->getAlive(), 'bool');
		$this->assertIdentical($this->pet->getAlive(), false);
	}	

	public function testGetOld()
	{
		$this->assertIsA($this->pet->getAge(), 'float');
		$this->pet->getOld(1.0);
		$this->assertIsA($this->pet->getAge(), 'float');
		$this->assertIdentical($this->pet->getAge(), 1.2);
	}
}