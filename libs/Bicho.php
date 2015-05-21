<?php

/**
* 
*/
class Bicho
{
	private $nome;
	private $idade;
	
	function __construct($nome, $idade)
	{
		$this->nome = $nome;
		$this->idade = $idade;

		echo "Olá, meu nome é {$this->nome}. Tenho apenas {$this->idade}";
	}
}