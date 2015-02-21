<?php


class Army extends Unit{
    private $units = [];

    public function addUnit( Unit $unit) {
        if ( in_array($unit, $this->units, true) ) {
            return;
        }

        $this->units[] = $unit;
    }

    public function bombardStrength() {
        $ret = 0;
        foreach( $this->units as $unit ) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }

    public function removeUnit(Unit $unit)
    {
        $this->units = array_udiff($this->units, array( $unit),
            function($a, $b) {
                return $a === $b ? 0 : 1;
            }
        );
    }
}