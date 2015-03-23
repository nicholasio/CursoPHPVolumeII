<?php
require_once( __DIR__ . '/../vendor/autoload.php');

class CalculadoraTest extends PHPUnit_Framework_TestCase {
    private $calc;

    public function setUp() {
        $this->calc = new Unittests\Calculadora();
    }

    public function testAddNumbers() {
        $this->assertEquals(7, $this->calc->add(2,5));
    }

    public function testSubtractNumbers() {
        $this->assertEquals(0, $this->calc->sub(3,3));

        $testsSet = [ [10,20, -10], [20,17, 3], [15,11,4] ];
        foreach($testsSet as $test) {
            $this->assertEquals($test[2],$this->calc->sub($test[0], $test[1]) );
        }

    }

    public function testDivisionNumbers() {
        $this->assertEquals(1.5, $this->calc->div(15,10));
    }

    public function testDivisionException() {
        $this->setExpectedException("Exception");

        $this->calc->div(0,0);
    }

    public function testMultiplicationNumbers() {

        $this->assertEquals(100, $this->calc->mult(10,10));
    }
}