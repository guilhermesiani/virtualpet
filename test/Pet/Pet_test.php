<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/test/simpletest/autorun.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/Pet.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/AnimalKingdom/AnimalKingdom.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/AnimalKingdom/MartianAnimalKingdom.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/Specie/Flying.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/MartianPet/MartianPet.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/Pet/MartianPet/MartianFlyingPet.php');

use Libs\Pet\MartianPet\MartianPet as MartianPet;
use Libs\Pet\MartianPet\MartianFlyingPet as MartianFlyingPet;

Mock::generate('Strawberry');
Mock::generate('Ball');

/**
* 
*/
class TestOfPet extends UnitTestCase
{
	public function testInstanceWithValidDependencyShouldWork()
	{
		$pet = new MartianPet(new MartianFlyingPet);
		$this->assertIsA($pet, 'Libs\Pet\MartianPet\MartianPet');
		$this->assertIsA($pet, 'Libs\Pet\Pet');
	}

	public function testInstanceWithInvalidDependencyShouldThrownAnException()
	{
		$this->expectException();

		$pet = new MartianPet('expect an exception');
	}	

	public function testSetIdShouldRetrieveAnEqualIntValueOnGet()
	{
		$pet = new MartianPet(new MartianFlyingPet);		
		$pet->setId(2);
		$this->assertIdentical($pet->getId(), 2);
	}

	public function testSetNameShouldRetrieveAnEqualStringValueOnGet()
	{
		$pet = new MartianPet(new MartianFlyingPet);
		$pet->setName('Other name');
		$this->assertIdentical($pet->getName(), 'Other name');
	}

	public function testSetAgeShouldRetrieveAnEqualFloatValueOnGet()
	{
		$pet = new MartianPet(new MartianFlyingPet);
		$pet->setAge(3.56);
		$this->assertIdentical($pet->getAge(), 3.56);
	}

	public function testSetHungerWithIntValueShouldWork()
	{
		$pet = new MartianPet(new MartianFlyingPet);		
		$pet->setHunger(3);
		$this->assertIdentical($pet->getHunger(), 3);
	}

	public function testSetHungerWithFloatValueShouldWorkAndRoundUpConvertedInt()
	{
		$pet = new MartianPet(new MartianFlyingPet);
		$pet->setHunger(3.7);
		$this->assertIdentical($pet->getHunger(), 4);
	}	

	public function testSetStressShouldRetrieveAnEqualIntValueOnGet() 
	{
		$pet = new MartianPet(new MartianFlyingPet);		
		$pet->setStress(3);
		$this->assertIdentical($pet->getStress(), 3);
	}

	public function testFeedPetWithFoodInstanceShouldWork()
	{
		$strawberry = new MockStrawberry();
		$strawberry->returns('getSatisfied', 3);

		$pet = new MartianPet(new MartianFlyingPet);
		$pet->setHunger(100);
		$pet->feed($strawberry);
		$this->assertEqual($pet->getHunger(), 97);
	}

	public function testFeedPetWithInvalidValueShouldThrowAnException()
	{
		$this->expectException();	

		$ball = new MockBall();
		$pet = new MartianPet(new MartianFlyingPet);
		$pet->feed($ball);
	}

	public function testPlayWithPetWithToyInstanceShouldWork()
	{
		$ball = new MockBall();
		$ball->returns('getHappy', 20);

		$pet = new MartianPet(new MartianFlyingPet);
		$pet->setStress(100);
		$pet->play($ball);
		$this->assertEqual($pet->getStress(), 80);
	}

	public function testPlayWithPetWithAnInvalidValueShouldThrowAnException()
	{
		$this->expectedException();	

		$strawberry = new MockStrawberry();
		$pet = new MartianPet(new MartianFlyingPet);
		$pet->feed($strawberry);
	}	

	public function testPetDieShouldReturnFalseOnGetAlive() 
	{
		$pet = new MartianPet(new MartianFlyingPet);		
		$this->assertIsA($pet->getAlive(), 'bool');
		$pet->die();
		$this->assertIsA($pet->getAlive(), 'bool');
		$this->assertIdentical($pet->getAlive(), false);
	}	

	public function testPetShouldGetOldWithFloatValueWithDefinedFactor()
	{
		$pet = new MartianPet(new MartianFlyingPet);		
		$this->assertIsA($pet->getAge(), 'float');
		$pet->getOld(1.0);
		$this->assertIsA($pet->getAge(), 'float');
		$this->assertIdentical($pet->getAge(), 1.2);
	}
}
