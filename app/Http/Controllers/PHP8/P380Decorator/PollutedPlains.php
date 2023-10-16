<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

class PollutedPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() - 4;
    }
}
