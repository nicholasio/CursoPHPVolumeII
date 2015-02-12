<?php
namespace Plantas;
include_once("Pessoa.php");
use \Vertebrados\Pessoa as Pessoa;

/**
 * Class Rosa
 * @package Plantas
 * Aula 6 - Namespaces
 */


class Rosa {
    public $nome;
    public $cor;

    /**
     * @var $dono (Vertebrados\Pessoa)
     */
    public $dono;

    public function __construct( Pessoa $dono) {
        $this->dono = $dono;
    }
}