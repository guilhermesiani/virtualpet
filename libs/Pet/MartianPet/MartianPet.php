<?php

namespace Libs\Pets;

class MartianPet extends Pet 
{
	
	public function __construct(string $name, MartianAnimalKingdom $kind) 
	{
		parent::__construct($name, $kind);
	}

	public function getOld()
	{
		$this->setAge($this->getAge + 0.2);
	}
}