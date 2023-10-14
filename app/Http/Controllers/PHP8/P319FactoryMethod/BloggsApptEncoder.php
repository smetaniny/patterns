<?php

namespace App\Http\Controllers\PHP8\P319FactoryMethod;

// Конкретный класс BloggsApptEncoder, который наследует абстрактный класс ApptEncoder
class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Данные о встрече в формате BloggsCal <br />";
    }
}
