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

	public function getHost(): string
	{
		return $this->host;
	}

	public function getDbName(): string
	{
		return $this->dbname;
	}

	public function getUser(): string
	{
		return $this->user;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	abstract public function getDsn(): string;
}
