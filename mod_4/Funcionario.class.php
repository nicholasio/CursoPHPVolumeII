<?php

final class Funcionario extends Pessoa {
    private $salario;
    private $cargo;

    public function __construct($nome, $endereco, $telefone, DateTime $anoNascimento, $salario, $cargo ) {
        parent::__construct($nome, $endereco, $telefone, $anoNascimento);

        $this->salario = $salario;
        $this->cargo = $cargo;
    }

    public function __toString() {
        return parent::__toString() . " Salário: " . $this->salario . ", Cargo : " . $this->cargo;
    }

    public function metodoPolimorfismo() {
        echo "Método chamado da classe Funcionario <br />";
    }
}
