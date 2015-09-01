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

	public function select($query, $array = [], $fetchMode = \PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($query);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}

		$sth->execute();

		return $sth->fetchAll($fetchMode);
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