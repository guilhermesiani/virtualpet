<?php

namespace Libs;

class Food {}
class Strawberry extends Food {}
class Toy {}
class Ball extends Toy {}

/**
* 
*/
class Action 
{
	private $pet;

	function __construct(Pet\Pet $pet)
	{
		$this->pet = $pet;
	}

	public function do(string $action, string $element)
	{
		if (!method_exists($this->pet, $action))
			throw new Exception("The action '$action' does not exist");

		$element = '\\Libs\\'.$element;

		$this->pet->$action(new $element);
	}
}