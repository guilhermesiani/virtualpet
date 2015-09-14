<?php

namespace Libs\DAO;

use Libs\DAO\DAOInterface as DAOInterface;
use Libs\Model as Model;
use Libs\Pet\PetFactory\PetFactory as PetFactory;

/**
* 
*/
class PetDAO extends Model
{
	// not working
	// public function findById(int $id): Pet
	public function findById(int $id)
	{
		$data = $this->select("SELECT pet_id, age, hunger, stress, 
			alive, planet, kind FROM pet AS p
			LEFT JOIN pet_planet AS pp ON pp.pet_planet_id = p.pet_planet_id 
			LEFT JOIN pet_kind AS pk ON pk.pet_kind_id = p.pet_kind_id 
			WHERE p.pet_id = :id limit 1", 
			[':id' => $id]
		)[0];

		$petFactory = new PetFactory($data['planet'], $data['kind']);
		$pet = $petFactory->createPet();

	    $pet->setId($data['pet_id']);
	    $pet->setName('Little Dolly');
	    $pet->setAge($data['age']);
	    $pet->setHunger($data['hunger']);
	    $pet->setStress($data['stress']);

	    if ($data['alive'] != 1)
	    	$pet->die();

	    return $pet;		
	}

	public function save(Pet $pet)
	{
		$petArray = [
			'age' => $petOwner->getAge(),
			'hunger' => $petOwner->getHunger(),
			'stress' => $petOwner->getStress(),
			'alive' => $petOwner->getAlive()
		];

		try {
			if ($pet->getNewborn()) {
				$this->insert('pet', $petArray);
			} else {
				$this->update('pet', $petArray, "pet_id = {$pet->getId}");				
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}
