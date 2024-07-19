<?php

namespace App\Http\Controllers\SpecialistPatterns\Flyweight;

/**
 * Фабрика для создания категорий товаров
 */
class CategoryFactory
{
    private $categories = [];

    public function getCategory($name)
    {
        // Проверяем, существует ли категория с таким именем в кеше
        if (!isset($this->categories[$name])) {
            // Если нет, создаем новую категорию
            $category = new Category($name);
            // Сохраняем ее в кеше
            $this->categories[$name] = $category;
        }

        return $this->categories[$name];
    }
}
