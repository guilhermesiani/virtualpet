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
		$stmt = $this->db->prepare("SELECT * FROM pet_planet WHERE pet_planet_id = 1");
		$stmt->execute();
		$data = $stmt->fetchAll();

		echo '<pre>';
		print_r($data);
		exit;
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