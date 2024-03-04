<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class Door extends \App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\MapSite
{
    protected $room1;
    protected $room2;

    public function __construct(Room $room1, Room $room2)
    {
        $this->room1 = $room1;
        $this->room2 = $room2;
    }

    public function initialize(Room $room1, Room $room2)
    {
        $this->room1 = $room1;
        $this->room2 = $room2;
    }

    public function clone(): Door
    {
        return new Door($this->room1, $this->room2);
    }

    public function enter()
    {
        // Implement enter method
    }
}

