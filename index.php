<?php

include 'config.php';

// function autoload($className)
// {
// 	$className = ltrim($className, '\\');
// 	$fileName = '';
// 	$namespace = '';

// 	if ($lastNsPos = strpos($className, '\\')) {
// 		$namespace = substr($className, 0, $lastNsPos);
// 		$className = substr($className, $lastNsPos + 1);
// 		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
// 	}

// 	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
// 	$fileName = lcfirst($fileName);
	
// 	require $fileName;
// }

// spl_autoload_register('autoload');

// Mac ou Linux
spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', $class . '.php'));
});

$app = new Libs\Bootstrap();
