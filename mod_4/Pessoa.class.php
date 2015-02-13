<?php

class Pessoa {

	//public na aula 2
	protected $nome;
	protected $endereco;
	protected $telefone;
	protected $anoNascimento;

	public function __construct($nome, $endereco, $telefone, DateTime $anoNascimento) {
		$this->nome = $nome;
		$this->endereco = $endereco;
		$this->telefone = $telefone;
		$this->anoNascimento = $anoNascimento;
	}

	public function calcularIdade() {
		$curr_date = new DateTime(null, new DateTimeZone('America/Fortaleza') );
		return $curr_date->diff($this->anoNascimento)->y;
	}

	public function __toString() {
		return "{$this->nome} nasceu em " . $this->anoNascimento->format('d/m/Y') .
		       " mora no endereco: " . $this->endereco . ", Telefone: " . $this->telefone;
	}

	/**
	 * Aula 6 - Polimorfismo
	 */

	public function metodoPolimorfismo() {
		echo "Método chamado da classe Pessoa";
	}
}