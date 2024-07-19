<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class BombedWall extends Wall {
    private bool $_bomb;

    public function __construct(bool $bomb = false) {
        parent::__construct();
        $this->_bomb = $bomb;
    }

    public function clone(): Wall {
        return new BombedWall($this->_bomb);
    }

    public function hasBomb(): bool {
        return $this->_bomb;
    }
}
