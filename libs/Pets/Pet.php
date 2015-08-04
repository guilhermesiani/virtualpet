<?php

namespace Libs;

/**
 * Superclass abstract.
 */
abstract class Pet {

	private $age;
	private $name;
	private $type;
	private $planet;
		
	/**
	 * [__construct description]
	 * This Method construct a pet.
	 * @param name [type] string
	 * @param age [type] integer
	 */
	function __construct($name, $age){

		if($this->setName($name) && $this->setName($age)){
			echo "Olá, meu nome é {$this->name}. Tenho apenas {$this->age}";
			return true;
		}

		echo "Informe nome com string e idade com integer";
		return false;
		
	}

	/**
	 * [setName description]
	 * Method to set $name
	 * Método para setar atributo $name.
	 * @param name [type] string
	 */
	private function setName($name)
	{
		if(is_string($name)){
			$this->name = $name;
			return true;
		}
		return false;
	}

	/**
	 * [setIdade description]
	 * Método para setar atributo $age.
	 * @param age [type] integer
	 * @return [type] boolean
	 */
	private function setAge($age)
	{
		if(is_integer($age)){
			$this->age = $age;
			return true;
		}
		return false;
	}

	/**
	 * [setPlaneta description]
	 * Method to set 
	 * Método para setar atributo $planeta.
	 * @param Planet
	 */
	private function setPlanet(Planet $planet)
	{
		$this->planet = $planet;
	}

	/**
	 * [setPlaneta description]
	 * Method to set 
	 * Método para setar atributo $planeta.
	 * @param Type
	 */
	private function setType(Type $type)
	{
		$this->type = $type;
	}

	/**
	 * [getName description]
	 * Força a classe filha a ter este método get.
	 */
	protected abstract function getName();

	/**
	 * [getAge description]
	 * Força a classe filha a ter este método get.
	 */
	protected abstract function getAge();

	/**
	 * [envelhecer description]
	 * Força a classe filha a ter este método. O evelhecimento será definido de acordo com o planeta.
	 * @param planet [type] object
	 */
	protected abstract function petGetOld(Planet $planet);
}