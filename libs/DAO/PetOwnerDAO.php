<?php

namespace \Libs\DAO;

use \Libs\PetOwner\PetOwner as PetOwner;

/**
* 
*/
class PetOwnerDAO extends Model
{
	private $lastInsertId;

	public function insert(PetOwner $petOwner, string $password): void
	{
		if ($petOwner->id)
			throw new Exception('Can not insert PetOwner with an existing ID.');

		try {
			// TODO: Implementar transacao para garantir que o ID retornado seja do insert atual
			$this->db->insert('pet_owner',
				[
					'username' 		=> $petOwner->username,
					'email' 		=> $petOwner->email,
					'password' 		=> \Libs\Password::create($petOwner->password),
					'register_date' => date('Y-m-d H:i:s')
				]	
			);

			$this->lastInsertId = $this->db->lastInsertId();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function getLastInsertId(): int
	{
		return $this->lastInsertId;
	}

	public function getByEmail(string $email): PetOwner
	{
		$data = $this->db->select('SELECT pet_owner_id, email, password 
			FROM pet_owner WHERE email = :email', [':email' => $email])[0];

		if (empty($data)) return false;

		$petOwner = new PetOwner();
		$petOwner->set_id($data['id']);
		$petOwner->set_email($data['email']);
		$petOwner->set_password($data['password']);

		return $petOwner;
	}

	public function update(PetOwner $petOwner): void
	{
		$postData = [
			'username' => $petOwner->getUsername(),
			'email' => $petOwner->getEmail(),
			'password' => $petOwner->getPassword()
		];

		$tihs->db->update('pet_owner', $postData, "pet_owner_id = {$petOwner->getId}");
	}

	public function delete(PetOWner $petOwner): bool
	{
		// TODO
	}
}
