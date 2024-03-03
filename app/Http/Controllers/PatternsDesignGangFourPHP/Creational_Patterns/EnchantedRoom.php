<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory\Room;

class EnchantedRoom extends Room
{
    private $spell;

    public function __construct(int $n, Spell $spell)
    {
        parent::__construct($n);
        $this->spell = $spell;
    }
}

?>
