<?php

namespace Libs;

/**
* 
*/
class View
{
	
	public function render(string $name)
	{
		require "views/$name.php";
	}
}