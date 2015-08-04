<?php

namespace Libs;

/**
* 
*/
class Filter
{
	private $url;
	
	function __construct($url)
	{
		$this->filter($url);
	}

	private function filter(string $url) 
	{
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = str_replace('//', '/', $url);

		$this->url = $url;
	}

	public function getSanitizedUrl() : string 
	{
		return $this->url;
	}

	public function getArrayUrl() : array 
	{
		$url = array_filter(explode('/', $this->getSanitizedUrl()));

		if (count($url) <= 1)
			return [];

		return array_values($url);
	}
}