<?php

namespace Libs\DAO;

use Libs\DAO\DAOInterface as DAOInterface;
use Libs\DAO\DAOInvalidObjectException;
use Libs\Model as Model;
use Libs\PetOwner\PetOwner as PetOwner;

/**
* 
*/
class PetOwnerDAO extends Model implements DAOInterface
{

	public function getByEmail(string $email): PetOwner
	{
		$data = $this->select('SELECT pet_owner_id, email, password 
			FROM pet_owner WHERE email = :email', [':email' => $email])[0];

		if (empty($data)) return false;

		$petOwner = new PetOwner();
		$petOwner->set_id($data['id']);
		$petOwner->set_email($data['email']);
		$petOwner->set_password($data['password']);

		return $petOwner;
	}

	public function save($petOwner)
	{
		if (!$petOwner instanceof PetOwner)
			throw new DAOInvalidObjectException("Object passed to save is not an instance of 'PetOwner'");

		$petOwnerArray = [
			'username' => $petOwner->getUsername(),
			'email' => $petOwner->getEmail(),
			'password' => $petOwner->getPassword(),
			'register_date' => $petOwner->getRegisterDate()->format('Y-m-d')
		];

		try {
			if ($petOwner->getNewPetOwner()) {
				$this->insert('pet_owner', $petOwnerArray);
			} else {
				$this->update('pet_owner', $petOwnerArray, "pet_owner_id = {$petOwner->getId}");				
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}
