<?php

namespace Libs\Pet;

use Libs\Pet\AnimalKingdom\AnimalKingdom as AnimalKingdom;

/**
 * Superclass abstract.
 */
abstract class Pet {

	private $id;
	private $kind;
	private $name;
	private $age = 1;
	private $hunger = 0;
	private $stress = 0;
	private $alive = true;
		
	/**
	 * [__construct description]
	 * This Method construct a pet.
	 * @param name [type] string
	 * @param age [type] integer
	 */
	public function __construct(string $name, AnimalKingdom $kind) 
	{
		$this->name = $name;
		$this->kind = $kind;
	}

	public function setId(int $id)
	{
		$this->id = $id;
	}

	/**
	 * [setName description]
	 * Method to set $name
	 * Método para setar atributo $name.
	 * @param name [type] string
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

	/**
	 * [setIdade description]
	 * Método para setar atributo $age.
	 * @param age [type] integer
	 * @return [type] boolean
	 */
	public function setAge(float $age)
	{
		$this->age = $age;
	}

	public function setHunger(int $satisfied) 
	{
		$this->hunger = $satisfied;
	}

	public function setStress(int $placid) 
	{
		$this->stress = $placid;
	}

	public function getId(): int
	{
		return $this->id;
	}	

	/**
	 * [getName description]
	 * Força a classe filha a ter este método get.
	 */
	public function getName(): string 
	{
		return $this->name;
	}

	/**
	 * [getAge description]
	 * Força a classe filha a ter este método get.
	 */
	public function getAge(): float 
	{
		return $this->age;
	}

	public function getHunger(): int 
	{
		return $this->hunger;
	}

	public function getStress(): int 
	{
		return $this->stress;
	}

	public function getAlive(): bool
	{
		return $this->alive;
	}	

	/**
	 * [envelhecer description]
	 * Força a classe filha a ter este método. O evelhecimento será definido de acordo com o planeta.
	 * @param planet [type] object
	 */
	public abstract function getOld(float $factor);

	public function feed(\Libs\Food $food)
	{
		echo 'Eating... '.get_class($food);exit;
		$satisfied = $kind->eatFood($food); // new FreshMeet
		$this->setHunger($satisfied);
	}

	public function play(\Libs\Toy $toy)
	{
		echo 'Playing with... '.get_class($toy);exit;
		$placid = $kind->playWithToy($toy); // new Ball
		$this->setStress($placid);
	}	

	/**
	 *  :(
	 */
	public function die() 
	{
		$this->alive = false;
	}
}