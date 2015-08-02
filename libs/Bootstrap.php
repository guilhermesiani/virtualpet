<?php

namespace Libs;

/**
* Class Bootstrap
*/
class Bootstrap
{
	
	function __construct()
	{
		$uri = new Filter($_SERVER['REQUEST_URI']);
		$url = $uri->getArrayUrl();

		if (empty($url[0])) {
			require 'controllers/index.php';
			(new \Controllers\Index)->index();
			(new \Controllers\Index)->loadModel('index');
			return false;
		}

		$file = "controllers/{$url[0]}";

		if (!file_exists($file)) {

		}
	}

	public function error404() {
		
	}
}