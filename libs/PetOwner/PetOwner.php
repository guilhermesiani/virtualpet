<?php

namespace Libs\PetOwner;

use DateTime;

/**
* 
*/
class PetOwner
{
	private $id;
	private $username;
	private $email;
	private $password;
	private $registerDate;
	
	function __construct() 
	{
		$this->registerDate = new DateTime();
	}

	public function setId(int $id)
	{
		$this->id = $id;
	}

	public function setUsername(string $username)
	{
		$this->username = $username;
	}

	public function setEmail(string $email)
	{
		$this->email = $email;
	}

	public function setPassword(string $password)
	{
		$this->password = $password;
	}

	public function setRegisterDate(DateTime $registerDate)
	{
		$this->registerDate = $registerDate;
	}	

	public function getId(): int
	{
		return $this->id;
	}	

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Hash password
	 */
	public function getPassword(): string
	{
		return $this->password;
	}		

	public function getRegisterDate(): DateTime
	{
		if (!$this->registerDate instanceof DateTime)
			return new DateTime;

		return $this->registerDate;
	}	

	public function getNewPetOwner(): bool 
	{
		return is_null($this->id);
	}				
}