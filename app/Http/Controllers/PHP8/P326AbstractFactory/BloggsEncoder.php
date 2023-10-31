<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

// Конкретный класс BloggsEncoder, который наследует интерфейс Encoder
class BloggsEncoder implements Encoder
{
    // Реализация метода encode(), который возвращает строку, представляющую данные в формате BloggsCal
    public function encode(): string
    {
        return "Данные о встрече в формате BloggsCal <br />";
    }
}
