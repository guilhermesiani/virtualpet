<?php

namespace Libs\Pet\MartianPet;

use Libs\Pet\AnimalKingdom\MartianAnimalKingdom as MartianAnimalKingdom;

class MartianPet extends \Libs\Pet\Pet 
{
	private $getOldFactor = 0.2; 
	
	public function __construct(string $name, MartianAnimalKingdom $kind) 
	{
		parent::__construct($name, $kind);
	}

	public function getOld(float $time)
	{
		$this->setAge($time + $this->getOldFactor);
	}
}