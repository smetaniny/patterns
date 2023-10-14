<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

// Конкретный класс BloggsApptEncoder, который наследует абстрактный класс ApptEncoder
class BloggsEncoder implements Encoder
{
    public function encode(): string
    {
        return "Данные о встрече в формате BloggsCal <br />";
    }
}
