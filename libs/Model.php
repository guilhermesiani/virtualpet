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
			DB_HOST,
			DB_NAME,
			DB_USER,
			DB_PASSWORD
		);

		$this->db = (new Database($postgreSQLConnectorConfig))->getConnection();
	}

	protected function select(
		string $query, 
		array $array = [], 
		$fetchMode = \PDO::FETCH_ASSOC): array
	{
		$sth = $this->db->prepare($query);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}

		$sth->execute();

		return $sth->fetchAll($fetchMode);
	}

	protected function insert(string $table, array $data)
	{
		ksort($data);

		$fieldNames = implode(', ', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));

		$sth = $this->db->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}	

	protected function update(string $table, array $data, string $where)
	{
		ksort($data);

		$fieldDetails = null;
		foreach ($data as $key => $value) {
			$fieldDetails .= "`$key` = :$key,";
		}

		$fieldDetails = rtrim($fieldDetails, ',');

		$sth = $this->db->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}	

	protected function delete()
	{
		// TODO
	}

	public function getLastInsertId(): int
	{
		return $this->db->lastInsertId();
	}	

	public function __call(string $method, array $arguments)
	{
		throw new \Exception(sprintf("%s does not have a function called '%s'", get_class($this), $method));
	}		
}