<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory;


use SplObjectStorage;

class Maze
{
    protected $rooms;

    public function __construct()
    {
        $this->rooms = new SplObjectStorage();
    }

    public function addRoom(Room $room)
    {
        $this->rooms->attach($room);
    }

    public function roomNo(int $roomNumber): ?Room
    {
        foreach ($this->rooms as $room) {
            if ($room->getRoomNumber() === $roomNumber) {
                return $room;
            }
        }
        return null;
    }

    public function clone(): Maze
    {
        return clone $this;
    }
}
