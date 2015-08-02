<?php

namespace Models;

use Libs;

/**
* Index Model
*/
class Index_Model extends \Libs\Model
{
	
	function __construct()
	{
		parent::__construct();
		echo 'Index model.';
	}
}