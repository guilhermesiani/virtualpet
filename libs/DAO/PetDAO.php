<?php

namespace Libs\DAO;

use Libs\Model as Model;
use Libs\Pet\PetFactory as PetFactory;

/**
* 
*/
class PetDAO extends Model
{
	public function findById(int $id): Pet
	{
		$data = $this->db->select("SELECT pet_id, age, hunger, stress, 
			alive, planet, kind FROM pet AS p
			LEFT JOIN pet_planet AS pp ON pp.pet_planet_id = p.pet_planet_id 
			LEFT JOIN pet_kind AS pk ON pk.pet_kind_id = p.pet_kind_id 
			WHERE p.pet_id = :id limit 1", 
			[':id' => $id]
		);

		$petFactory = new PetFactory($data['planet'], $data['kind']);
		$pet = $petFactory->createPet();

	    $pet->setId($petData['pet_id']);
	    $pet->setName('Little Dolly');
	    $pet->setAge($petData['age']);
	    $pet->setHunger(90);
	    $pet->setStress(90);

	    if ($petData['alive'] != 1)
	    	$pet->die();

	    return $pet;		
	}
}