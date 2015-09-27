<?php

require_once('simpletest/autorun.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/libs/filter.php');

/**
* 
*/
class TestOfFilter extends UnitTestCase
{
	function testGetArrayUrl() {
		$filter = new Libs\Filter('//bichovirtual/class//method/param//');

		$this->assertEqual($filter->getArrayUrl(), ['bichovirtual', 'class', 'method', 'param']);
	}
}