<?php

namespace Libs;

/**
 * Superclasse abstrata.
 */
abstract class Bicho {

	private $nome;
	private $idade;
	private $planeta;
		
	/**
	 * [__construct description]
	 * Este método irá construir um bicho. Porém, o planeta será definido em uma classe filha.
	 * @param nome [type] string
	 * @param idade [type] integer
	 */
	function __construct($nome, $idade){

		if($this->setNome($nome) && $this->setIdade($idade)){
			echo "Olá, meu nome é {$this->nome}. Tenho apenas {$this->idade}";
			return true;
		}

		echo "Informe nome com string e idade com integer";
		return false;
		
	}

	/**
	 * [setNome description]
	 * Método para setar atributo $nome.
	 * @param nome [type] string
	 */
	private function setNome($nome){
		if(is_string($nome)){
			$this->nome = $nome;
			return true;
		}
		return false;
	}

	/**
	 * [setIdade description]
	 * Método para setar atributo $idade.
	 * @param idade [type] integer
	 * @return [type] boolean
	 */
	private function setIdade($idade){
		if(is_integer($idade)){
			$this->idade = $idade;
			return true;
		}
		return false;
	}

	/**
	 * [setPlaneta description]
	 * Método para setar atributo $planeta.
	 * @param Planeta
	 */
	private function setPlaneta(Planeta $planeta){
		$this->planeta = $planeta;
	}

	/**
	 * [getNome description]
	 * Força a classe filha a ter este método get.
	 */
	abstract function getNome();

	/**
	 * [getIdade description]
	 * Força a classe filha a ter este método get.
	 */
	abstract function getIdade();

	/**
	 * [envelhecer description]
	 * Força a classe filha a ter este método. O evelhecimento será definido de acordo com o planeta.
	 * @param planeta [type] object
	 */
	abstract function envelhecer(Planeta $planeta);
}