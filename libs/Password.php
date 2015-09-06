<?php

namespace Libs;

/**
* 
*/
class Password
{
	public static function create(string $password): string
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public static function verify(string $password, string $hash): bool
	{
		return password_verify($password, $hash);
	}
}