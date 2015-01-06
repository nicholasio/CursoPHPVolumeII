<?php
namespace Automoveis;

class Carro {

	//Aula 4 - Atributos constantes
	const IPI = 0.25;

	public $nome;
	private $potencia;
	private $nPortas;
	private $velocidadeMax;
	private $tracao;

	//Aula 4 - Atributos constantes
	private $preco;

	//Aula 3 - Métodos estáticos
	private static $nCarros = 0;

	//Aula 3 - Métodos estáticos
	public function __construct() {
		self::$nCarros = 0;
	}

	public function setTracao( $tracao ) {
		$this->tracao = $this->_checkTracao($tracao);
	}

	public function getTracao() { return $this->tracao; }

	private function _checkTracao( $tracao ) {
		if ( $tracao != "4x2" && $tracao != "4x4")
			return "invalid";
		else
			return $tracao;
	}

	/**
	 * Aula 2 - Encapsulamento
	 */

	public function getPotencia() {
		return $this->potencia;
	}

	public function setPotencia( $potencia ) {
		$this->potencia = $potencia;
	}

	public function getNPortas() {
		return $this->nPortas;
	}

	public function setNPortas( $nPortas ) {
		$this->nPortas = $nPortas;
	}

	public function getVelocidadeMax() {
		return $this->velocidadeMax;
	}

	public function setVelocidadeMax( $velocidadeMax ) {
		$this->velocidadeMax = $velocidadeMax;
	}

	/**
	 * Aula 3 - Métodos estáticos
	 */

	public static function calculaVelocidadeMedia( $distanciaPercorrida, $tempo) {
		return $distanciaPercorrida / $tempo;
	}

	public static function getNCarros() {
		return self::$nCarros;
	}

	/**
	 * Aula 4 - Atributos Constantes
	 */

	public function setPreco( $preco ) {
		$this->preco = $preco;
	}

	public function getPreco() {
		return $this->preco + ($this->preco * self::IPI);
	}
}