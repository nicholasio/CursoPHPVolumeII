<?php
class Calculadora {
    public function add($x, $y) {
        return $x + $y;
    }

    public function sub($x, $y) {
        return $x - $y;
    }

    public function div($x, $y) {
        if ( $y == 0 ) {
            throw new Exception("Division By Zero");
        }
        return $x/$y;
    }

    public function mult($x, $y) {
        return $x*$y;
    }
}