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
	private $actions = ['feed', 'play'];

	function __construct(Pet\Pet $pet)
	{
		$this->pet = $pet;
	}

	public function do(string $action, string $element)
	{
		if (!in_array($action, $this->actions))
			throw new Exception("The action '$action' does not exist");

		$element = '\\Libs\\'.$element;

		$this->pet->$action(new $element);
	}
}