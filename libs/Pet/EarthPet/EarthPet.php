<?php

namespace Libs\Pets;

class EarthPet extends Pet 
{
	
	public function __construct(string $name, EarthAnimalKingdom $kind) 
	{
		parent::__construct($name, $kind);
	}

	public function getOld()
	{
		$this->setAge($this->getAge + 0.336);
	}
}