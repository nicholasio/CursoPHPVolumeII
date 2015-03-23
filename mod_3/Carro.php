<?php
namespace Automoveis;

class Carro {

    const IPI = 0.25;

    public $nome;
    private $potencia;
    private $nPortas;
    private $velocidadeMax;
    private $tracao;

    private static $nCarros = 0;

    private $preco;

    public function __construct() {
        $this->potencia = 0;
        self::$nCarros++;
    }

    public function setTracao( $tracao ) {
        $this->tracao = $this->_checkTracao($tracao);
    }

    /**
     * @return int
     */
    public function getPotencia()
    {
        return $this->potencia;
    }

    /**
     * @param int $potencia
     */
    public function setPotencia($potencia)
    {
        $this->potencia = $potencia;
    }

    /**
     * @return mixed
     */
    public function getVelocidadeMax()
    {
        return $this->velocidadeMax;
    }

    /**
     * @param mixed $velocidadeMax
     */
    public function setVelocidadeMax($velocidadeMax)
    {
        $this->velocidadeMax = $velocidadeMax;
    }

    /**
     * @return mixed
     */
    public function getNPortas()
    {
        return $this->nPortas;
    }

    /**
     * @param mixed $nPortas
     */
    public function setNPortas($nPortas)
    {
        $this->nPortas = $nPortas;
    }

    public function getTracao() { return $this->tracao; }

    private function _checkTracao( $tracao ) {
        if ( $tracao != "4x2" && $tracao != "4x4" )
            return "invalid";
        else
            return $tracao;
    }

    public static function getNCarros() {
        return self::$nCarros;
    }

    public static function calculaVelocidadeMedia ( $distanciaPercorrida, $tempo) {
        return $distanciaPercorrida / $tempo;
    }

    public function setPreco( $preco ) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco + ($this->preco * self::IPI);
    }
}