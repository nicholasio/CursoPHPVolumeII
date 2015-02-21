<?php
class UnitException extends Exception {}

abstract class Unit {
    public function addUnit(Unit $unit) {
        throw new UnitException( get_class($this). " é uma folha");
    }
    public function removeUnit(Unit $unit) {
        throw new UnitException( get_class($this). " é uma folha");
    }
    abstract public function bombardStrength();
}