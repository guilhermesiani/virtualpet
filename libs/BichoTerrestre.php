<?php

namespace Libs;

class BichoTerrestre extends Bicho {

	function __construct($nome, $idade){

		if($planeta = new PlanetaTerra){
			parent::setPlaneta($planeta);
		}

		parent::__construct($nome, $idade);

	{

	protected function getNome(){
		return $this->nome;
	}

	protected function getIdade(){
		return $this->idade;
	}

	protected function envelhecer(Planeta $planeta){
		//de acordo com o planeta, o envelhecimento é diferente.
	}
}