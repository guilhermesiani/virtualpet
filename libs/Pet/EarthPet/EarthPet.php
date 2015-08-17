<?php

namespace Libs\Pet\EarthPet;

use Libs\Pet\AnimalKingdom\EarthAnimalKingdom as EarthAnimalKingdom;

class EarthPet extends \Libs\Pet\Pet  
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