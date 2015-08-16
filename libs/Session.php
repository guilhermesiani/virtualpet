<?php

namespace Libs;

/**
* Singleton
*/
class Session
{
	private function __construct() {}

	public static function init()
	{
		session_start();
	}

	public static function set($key, $value = false)
	{
		if (is_object($value))
			$_SESSION[$key] = serialize($value);
		else
			$_SESSION[$key] = $value;
	}

	public static function get($key, $unserialize = false)
	{
		if ($unserialize)
			return unserialize($_SESSION[$key]);

		return $_SESSION[$key];
	}

	public static function destroy()
	{
		session_destroy();
	}
}