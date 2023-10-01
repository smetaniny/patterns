<?php

namespace App\Http\Controllers\SOLID\O\example2;


use App\Contracts\ContactInfoStrategy;

class MoscowContactInfoStrategy implements ContactInfoStrategy
{
    public function getInfo(): array
    {
        return ['Специфичная информация для Москвы'];
    }
}
