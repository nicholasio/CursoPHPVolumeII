<?php
class DiammondDecorator extends TileDecorator {

    public function getWealthFactor()
    {
        return $this->tile->getWealthFactor() + 2;
    }

}