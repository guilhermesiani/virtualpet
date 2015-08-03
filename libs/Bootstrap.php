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

		if (empty($url[1])) {
			require 'controllers/index.php';
			(new \Controllers\Index)->index();
			(new \Controllers\Index)->loadModel('index');
			return false;
		}

		$file = "controllers/{$url[1]}.php";

		if (!file_exists($file))
			$this->error404();

		require $file;
		$controllerName = '\\Controllers\\'.$url[1].'';
		$controller = new $controllerName;
		$controller->loadModel($url[1]);

		if (isset($url[3])) {
			if (method_exists($controller, $url[2])) {
				// Método recebe quantos argumentos for passado na URL
				$controller->{$url[2]}(...array_slice($url, 3));
			} else {
				$this->error404();
			}
		} else if (isset($url[2])) {
			if (method_exists($controller, $url[2])) {
				$controller->{$url[2]}();
			} else {
				$this->error404();
			}
		} else {
			$controller->index();
		}
	}

	public function error404() {
		die('404 error');	
	}
}