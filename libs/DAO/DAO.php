<?php

namespace Libs\DAO;

use Libs\DAO\PetDAO as PetDAO;
use Libs\DAO\PetOwnerDAO as PetOwnerDAO;

/**
* 
*/
class DAO
{
	private function __construct() {}

	public static function on(string $class)
	{
		$DAOClass = "\\Libs\\DAO\\{$class}DAO";

		if (!class_exists($DAOClass))
			throw new Exception("Data access object of {$class} does not exists");

		return new $DAOClass;
	}
}