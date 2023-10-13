<?php

namespace App\Http\Controllers\PHP8\FactoryMethod319;

class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Данные о встрече в формате MegaCal <br />";
    }
}
