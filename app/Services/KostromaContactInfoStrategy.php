<?php

namespace App\Services;

use App\Contracts\ContactInfoStrategy;

class KostromaContactInfoStrategy implements ContactInfoStrategy
{
    public function getInfo(): array
    {
        return ['Специфичная информация для Костромы'];
    }
}
