<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Room;

class EnchantedMazeGame extends MazeGame
{
    public function __construct()
    {
        echo "EnchantedMazeGame::__construct()" . PHP_EOL;
    }

    protected function castSpell(): Spell
    {
        echo "EnchantedMazeGame::castSpell()" . PHP_EOL;
        return new Spell;
    }

    public function makeRoom(int $n): EnchantedRoom
    {
        echo "EnchantedMazeGame::makeRoom()" . PHP_EOL;
        return new EnchantedRoom($n, $this->castSpell());
    }

    public function makeDoor(Room $r1, Room $r2): DoorNeedingSpell
    {
        echo "EnchantedMazeGame::makeDoor()" . PHP_EOL;
        return new DoorNeedingSpell($r1, $r2);
    }
}

?>
