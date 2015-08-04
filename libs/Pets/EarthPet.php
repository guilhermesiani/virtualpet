<?php

namespace Libs;

class EarthPet extends Pet {

	function __construct($name, $age) {

		if($planet = new PlanetEarth) {
			parent::setPlanet($planet);
		}

		parent::__construct($name, $age);

	{

	protected function getNome()
	{
		return $this->name;
	}

	protected function getAge()
	{
		return $this->age;
	}

	protected function petGetOld(Planet $planet)
	{
		//de acordo com o planeta, o envelhecimento é diferente.
	}
}