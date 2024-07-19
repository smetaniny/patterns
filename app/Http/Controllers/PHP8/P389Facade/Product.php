<?php

namespace App\Http\Controllers\PHP8\P389Facade;

/**
 * Класс Product представляет продукт с идентификатором и именем.
 */
class Product
{
    public string $id;
    public string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
