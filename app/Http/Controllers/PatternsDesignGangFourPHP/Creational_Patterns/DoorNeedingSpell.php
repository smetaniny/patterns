<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Room;

class DoorNeedingSpell extends Door
{
    public function __construct(Room $r1, Room $r2)
    {
        parent::__construct($r1, $r2);
    }
}
