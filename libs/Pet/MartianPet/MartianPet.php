<?php

namespace Libs\Pet\MartianPet;

use Libs\Pet\AnimalKingdom\MartianAnimalKingdom as MartianAnimalKingdom;

class MartianPet extends \Libs\Pet\Pet 
{
	
	public function __construct(string $name, MartianAnimalKingdom $kind) 
	{
		parent::__construct($name, $kind);
	}

	public function getOld(float $factor)
	{
		$this->setAge($this->getAge + 0.2);
	}
}