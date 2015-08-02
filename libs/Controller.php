<?php

namespace Libs;

/**
* 
*/
class Controller
{
	
	function __construct()
	{
		$this->view = new \Libs\View();
	}

	public function loadModel(string $model) {
		if (file_exists("models/{$model}_model.php")) {
			require "models/{$model}_model.php";

			$model = '\\Models\\'.$model.'_Model';
			$this->model = new $model();
		}
	}

}