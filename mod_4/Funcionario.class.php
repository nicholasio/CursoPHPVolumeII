<?php

//final aula 4
final class Funcionario extends Pessoa {

	private $salario; //public na aula 2
	private $cargo; //public na aula 2

	public function __construct($nome, $endereco, $telefone, DateTime $anoNascimento, $salario, $cargo) {
		parent::__construct($nome, $endereco, $telefone, $anoNascimento);

		$this->salario = $salario;
		$this->cargo = $cargo;
	}

	/**
	 * Aula 3 - Implementando Herança 2
	 */

	public function __toString() {
		return parent::__toString() . " Salário: " . $this->salario . ", Cargo: " . $this->cargo;
	}
}


//Erro
/*class Programador extends Funcionario {

}*/