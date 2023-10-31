<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

// Определение интерфейса Encoder
interface Encoder
{
    // Абстрактный метод encode, который должен быть реализован в классах, использующих этот интерфейс.
    public function encode(): string;
}
