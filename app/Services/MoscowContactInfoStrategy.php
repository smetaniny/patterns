<?php

namespace App\Services;


use App\Contracts\ContactInfoStrategy;

class MoscowContactInfoStrategy implements ContactInfoStrategy
{
    public function getInfo(): array
    {
        return ['Специфичная информация для Москвы'];
    }
}
