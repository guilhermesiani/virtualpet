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
		$stmt = $this->db->prepare("SELECT * FROM pet_planet WHERE pet_planet_id = 1 limit 1");

		echo '<pre>';
		if ($stmt->execute()) {
			while ($row = $stmt->fetch()) {
				print_r($row);
			}
		}


		echo '</pre>';
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