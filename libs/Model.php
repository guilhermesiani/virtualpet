<?php

namespace Libs;

user \Libs\Connector\DBConnectorConfig\PostgreSQLConnectorConfig as PostgreSQLConnectorConfig;

/**
* 
*/
class Model
{
	
	function __construct()
	{
		$postgreSQLConnectorConfig = new PostgreSQLConnectorConfig(
			'localhost',
			'dbname',
			'user',
			'pass'
		);

		$this->db = new Database($postgreSQLConnectorConfig);
	}

	public function select()
	{
		// TODO
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