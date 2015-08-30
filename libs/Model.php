<?php

namespace Libs;

use \Libs\Connector\DBConnectorConfig\PostgreSQLConnectorConfig as PostgreSQLConnectorConfig;

/**
* 
*/
class Model
{
	
	function __construct()
	{
		$postgreSQLConnectorConfig = new PostgreSQLConnectorConfig(
			'localhost',
			'virtualpet',
			'guilhermesiani',
			''
		);

		$this->db = (new Database($postgreSQLConnectorConfig))->getConnection();
	}

	public function select()
	{

	    // [pet_id] => 1
	    // [pet_owner_id] => 1
	    // [pet_planet_id] => 2
	    // [pet_kind_id] => 2
	    // [age] => 1
	    // [hunger] => 1
	    // [stress] => 1
	    // [alive] => 1
	    // [planet] => mars
	    // [kind] => marine

		$stmt = $this->db->prepare("SELECT pet_id, age, hunger, stress, 
			alive, planet, kind FROM pet AS p
			LEFT JOIN pet_planet AS pp ON pp.pet_planet_id = p.pet_planet_id 
			LEFT JOIN pet_kind AS pk ON pk.pet_kind_id = p.pet_kind_id 
			WHERE p.pet_id = 1 limit 1");

		try {
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function insert()
	{
		// TODO
	}	

	public function update()
	{
		// TODO
	}	

	public function delete()
	{
		// TODO
	}	
}