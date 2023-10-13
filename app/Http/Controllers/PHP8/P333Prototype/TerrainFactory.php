<?php

namespace App\Http\Controllers\PHP8\P333Prototype;

// Класс представляет фабрику (завод) для создания объектов, представляющих различные типы местности.
class TerrainFactory
{
    // Конструктор класса TerrainFactory, который принимает объекты для морских, равнинных и лесных местностей.
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    // Метод для получения объекта, представляющего морскую местность.
    public function getSea(): Sea
    {
        return clone $this->sea;
    }

    // Метод для получения объекта, представляющего равнинную местность.
    public function getPlains(): Plains
    {
        return clone $this->plains;
    }

    // Метод для получения объекта, представляющего лесную местность.
    public function getForest(): Forest
    {
        return clone $this->forest;
    }
}
