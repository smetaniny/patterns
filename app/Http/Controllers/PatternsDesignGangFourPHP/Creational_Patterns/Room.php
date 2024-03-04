<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class Room
{
    protected $_roomNumber;
    protected $_sides = [];

    public function __construct(int $n)
    {
        $this->_roomNumber = $n;
    }

    public function SetSide(int $direction, MapSite $ms): void
    {
        $this->_sides[$direction] = $ms;
    }

    public function GetRoomNumber(): int
    {
        return $this->_roomNumber;
    }

    public function Clone(): Room
    {
        return new Room($this->_roomNumber);
    }

    public function Enter(): void
    {
        // Реализация метода Enter
    }
}

?>
