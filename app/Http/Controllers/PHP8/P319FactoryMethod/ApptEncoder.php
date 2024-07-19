<?php

namespace App\Http\Controllers\PHP8\P319FactoryMethod;

// Абстрактный класс ApptEncoder, предоставляющий интерфейс для всех классов кодирования встреч
abstract class ApptEncoder
{
    abstract public function encode(): string;
}
