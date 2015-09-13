<?php

require_once('simpletest/autorun.php');
require_once('../libs/Password.php');

use Libs\Password as Password;

/**
* 
*/
class TestOfPassword extends UnitTestCase
{
	function testPasswordCreate() {
		$password = Password::create('someThing');
		$this->assertNotIdentical('someThing', $password);
	}

	function testCorrectPassword() {
		$password = Password::create('someThing');
		$this->assertTrue(Password::verify('someThing', $password));
	}

	function testIncorrectPassword() {
		$password = Password::create('someThing');
		$this->assertFalse(Password::verify('someThingElse', $password));		
	}
}