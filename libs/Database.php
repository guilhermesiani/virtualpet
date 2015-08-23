<?php

namespace Libs;

use \Libs\Connector\ConnectorConfig as ConnectorConfig;

/**
* 
*/
class Database implements \Libs\Connector\Connector
{
	private $instance;

	function __construct(ConnectorConfig $connectorConfig)
	{
		$this->connect($connectorConfig);
	}

	public function connect(ConnectorConfig $connectorConfig)
	{
		if (!$this->isConnected()) {
			$this->instance = new \PDO($connectorConfig->getDsn,
				$connectorConfig->getUser(),
				$connectorConfig->getPassword());

			$this->instance->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
		}
	}

	public function disconnect()
	{
		if ($this->isConnected)
			$this->instance = null;
	}

	public function isConnected() 
	{
		return ($this->instance instanceof PDO);
	}

	public function getConnection()
	{
		return $this->instance;
	}
}
