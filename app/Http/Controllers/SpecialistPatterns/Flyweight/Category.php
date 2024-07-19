<?php

namespace App\Http\Controllers\SpecialistPatterns\Flyweight;

/**
 * Класс для представления категории товаров
 */
class Category
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
