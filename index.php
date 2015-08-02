<?php

include 'configs/config.php';

function autoload($className)
{
	$className = ltrim($className, '\\');
	$fileName = '';
	$namespace = '';

	if ($lastNsPos = strpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}

	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

	require $fileName;
}

spl_autoload_register('autoload');


// Inserir namespaces e autoload
$app = new Libs\Bootstrap();
