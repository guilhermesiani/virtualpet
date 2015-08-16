<?php

namespace Libs\Pets;

class EarthPet extends Pet 
{
	private $getOldFactor = 0.336; 
	
	public function __construct(string $name, EarthAnimalKingdom $kind) 
	{
		parent::__construct($name, $kind);
	}

	public function getOld(float $time)
	{
		$this->setAge($time + $this->getOldFactor);
	}
}