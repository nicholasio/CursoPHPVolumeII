<?php
namespace Plantas;
include_once('Pessoa.php');
use \Vertebrados\Pessoa as Pessoa;

class Rosa {
    public $nome;
    public $cor;

    public $dono;

    public function __construct( Pessoa $dono ) {
        $this->dono = $dono;
    }
}