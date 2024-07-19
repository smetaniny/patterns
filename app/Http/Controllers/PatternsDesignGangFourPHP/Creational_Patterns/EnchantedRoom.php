<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class EnchantedRoom extends Room
{
    private $spell;

    public function __construct(int $n, Spell $spell)
    {
        parent::__construct($n);
        $this->spell = $spell;
    }
}
