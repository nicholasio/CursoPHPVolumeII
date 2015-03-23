<?php
abstract class TileDecorator extends Tile {
    protected $tile;

    public function __construct(Tile $tile) {
        $this->tile = $tile;
    }
}