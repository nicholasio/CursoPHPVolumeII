<?php

class Pessoa {
    public $idade;
    public $nome;
}

class PessoaAttrMet {
    public $idade;
    public $nome;
    public $profissao;
    public $salario;

    public static $qtdPessoas = 0;

    public function showDesc() {
        echo "{$this->nome} tem {$this->idade} anos, trabalha com {$this->profissao} e ganha {$this->salario}";
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        if ( $this->idade >= 0 )
            $this->idade = $idade;
    }

    public function __construct($nome = NULL, $idade = NULL) {
        $this->idade = $idade;
        $this->nome = $nome;
        $this->profissao = "Administrador";
        $this->salario = "700";

        echo "<h3>Construindo...</h3>";

        self::$qtdPessoas++;

    }


    public function __destruct() {
        echo "<h4>Destruindo {$this->nome}</h4>";
    }
}