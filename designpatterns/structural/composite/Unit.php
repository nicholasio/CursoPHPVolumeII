<?php
class UnitException extends Exception {}
abstract class Unit {
    public function addUnit(Unit $unit)
    {
        throw new UnitException();
    }

    public function removeUnit(Unit $unit)
    {
        throw new UnitException();
    }
    abstract public function bombardStrength();
}