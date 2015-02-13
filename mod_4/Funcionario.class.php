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

	/**
	 * Aula 6 - Polimorfismo
	 * Esse trecho de código faz parte da explicação de Polimorfismo
	 * Mas esse método não é para demonstrar o polimorfismo em si.
	 */

	public function getSalario() {
		return $this->salario;
	}


	/**
	 * Aula 6 - Polimorfismo
	 */

	public function metodoPolimorfismo() {
		echo "Método chamado da classe Funcionário";
	}
}


//Erro
/*class Programador extends Funcionario {

}*/