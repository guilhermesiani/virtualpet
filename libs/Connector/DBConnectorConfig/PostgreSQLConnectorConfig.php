<?php

namespace Libs\Connector\DBConnectorConfig;

/**
* 
*/
class PostgreSQLConnectorConfig extends \Libs\Connector\ConnectorConfig
{
	public function getDsn()
	{
		return sprintf('pgsql:host=%s;dbname=%s',
			$this->getHost(),
			$this->getDbName()
		);
	}
}
