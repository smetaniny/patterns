<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class RoomWithABomb extends Room {
    private bool $_bomb;

    public function __construct(int $n = 0, bool $bombed = false) {
        parent::__construct($n);
        $this->_bomb = $bombed;
    }

    public function hasBomb(): bool {
        return $this->_bomb;
    }
}
