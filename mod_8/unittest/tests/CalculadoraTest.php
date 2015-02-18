<?php
require('vendor/autoload.php');
require('app/Calculadora.php');

class CalculatoraTest extends PHPUnit_Framework_TestCase {

    private $calc;
    public function setUp() {
        $this->calc = new Calculadora();
    }
    public function testAddNumbers() {
        $this->assertEquals(4, $this->calc->add(2,2));
    }

    public function testSubtractNumbers() {
        $calc = new Calculadora();
        $this->assertEquals(0, $this->calc->sub(3,3));

        $testsSet = [ [10,20, -10], [20,17, 3], [15,11,4] ];
        foreach($testsSet as $test) {
            $this->assertEquals($test[2],$this->calc->sub($test[0], $test[1]) );
        }
    }

    public function testDivisionNumbers() {
        $calc = new Calculadora();

        $this->setExpectedException("Exception");
        $calc->div(0,0);

        $this->assertEquals(1.5, $this->calc->div(10,15));
    }

    public function testMultiplicationNumbers() {
        $calc = new Calculadora();

        $this->assertEquals(100, $this->calc->mult(10,10));
    }
}