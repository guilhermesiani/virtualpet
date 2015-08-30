<?php

namespace Libs\Pet\PetFactory;

use Libs\Pet\PetFactory\PetFactoryInterface as PetFactoryInterface;
use Libs\Pet\Pet as Pet;

/**
* 
*/
class PetFactory implements PetFactoryInterface
{
	private $planet;
	private $kind;

	function __construct(string $planet, string $kind) 
	{
		$this->planet = $this->getPlanetFromString($planet);
		$this->kind = $this->getKindFromString($kind);
	}

	public function createPet(): Pet
	{
		$petKindObject 	= "Libs\Pet\\".$this->planet."Pet\\".$this->planet.$this->kind."Pet";
		$petObject 		= "Libs\Pet\\".$this->planet."Pet\\".$this->planet."Pet";

		$pet = new $petObject(new $petKindObject);

	    return $pet;
	}

	private function getPlanetFromString(string $planet): string 
	{
		if ($planet == 'mars') {
			return 'Martian';
		} else if ($planet == 'earth') {
			return 'Earth';
		}
			
		throw new Exception("Planet not found from string: {$planet}");
	}

	private function getKindFromString(string $kind): string
	{
		if ($kind == 'flying') {
			return "Flying";
		} else if ($kind == 'marine') {
			return "Marine";
		} else if ($kind == 'terrestrial') {
			return "Terrestrial";
		}

		throw new Exception("Kind not found from string: {$kind}");				
	}
}
