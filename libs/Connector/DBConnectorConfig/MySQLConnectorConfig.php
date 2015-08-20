<?php

namespace Libs\Connector\DBConnectorConfig;

/**
* 
*/
class MySQLConnectorConfig extends \Libs\Connector\ConnectorConfig
{
	public function getDsn()
	{
		return sprintf('mysql:host=%s;dbname=%s',
			$this->getHost(),
			$this->getDbName()
		);
	}
}
