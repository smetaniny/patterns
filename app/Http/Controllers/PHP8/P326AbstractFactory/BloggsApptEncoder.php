<?php

namespace App\Http\Controllers\PHP8\AbstractFactory326;

// Конкретный класс BloggsApptEncoder, который наследует абстрактный класс ApptEncoder
class BloggsApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Данные о встрече в формате BloggsCal <br />";
    }
}
