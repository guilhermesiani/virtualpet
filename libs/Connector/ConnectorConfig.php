<?php

namespace Libs\Connector;

/**
* 
*/
abstract class ConnectorConfig
{
	private $host;
	private $dbname;
	private $user;
	private $password;

	function __construct(string $host, string $dbname, string $user, string $password)
	{
		$this->host = $host;
		$this->dbname = $dbname;
		$this->user = $user;
		$this->password = $password;
	}

	public function getHost()
	{
		return $host;
	}

	public function getDbName()
	{
		return $dbname;
	}

	public function getUser()
	{
		return $user;
	}

	public function getPassword()
	{
		return $password;
	}

	abstract public function getDsn();
}
