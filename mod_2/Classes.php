<?php

/**
 * Class Pessoa
 * Isto é a definição de uma classe
 */
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
        echo "{$this->nome} tem {$this->idade} anos, trabalha como {$this->profissao} e ganha {$this->salario}";
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    /**
     * Aula 3 - Cnstrutores e Destrutores
     * Construtor
     */
    public function __construct($nome = NULL) {
        $this->idade = 10;
        $this->nome = $nome;
        $this->profissao = "Administrador";
        $this->salario = "12 reais por mês";

        echo "<h3> Construindo....</h3>";

        //Aula 4- Atributos estáticos
        self::$qtdPessoas++;
    }


    /**
     * Aula 3 - Cnstrutores e Destrutores
     * Destrutor
     */
    public function __destruct() {
        echo "<h4>Destruindo {$this->nome}.....</h4>";
    }
}