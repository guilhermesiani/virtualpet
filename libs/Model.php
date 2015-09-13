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

	protected function insert(string $table, array $data): void
	{
		ksort($data);

		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));

		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}	

	protected function update(string $table, array $data, string $where): void
	{
		ksort($data);

		$fieldDetails = null;
		foreach ($data as $key => $value) {
			$fieldDetails .= "`$key` = :$key,";
		}

		$fieldDetails = rtrim($fieldDetails, ',');

		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}	

	public function delete()
	{
		// TODO
	}

	public function __call(string $method, array $arguments): void
	{
		throw new \Exception(sprintf("%s does not have a function called '%s'", get_class($this), $method));
	}		
}