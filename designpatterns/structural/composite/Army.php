<?php


class Army extends Unit {

    private $units;

    public function __construct() {
        $this->units = new SplObjectStorage();
    }
    public function addUnit(Unit $unit)
    {
        if ( ! $this->units->contains($unit) )
            $this->units->attach($unit);

    }

    public function removeUnit(Unit $unit)
    {
        $this->units->detach($unit);
    }

    public function bombardStrength()
    {
        $power = 0;
        foreach($this->units as $unit) {
            $power += $unit->bombardStrength();
        }

        return $power;
    }
}