<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс HouseBuilder реализует интерфейс Builder и представляет конкретную реализацию строителя для создания объекта House.
class HouseBuilder implements Builder
{
    private House $house;

    // Сбрасывает текущее состояние строительства
    public function reset()
    {
        $this->house = new House();
    }

    // Подготовка фундамента
    public function prepare()
    {
        echo "Подготовка фундамента<br />";
        $this->house->setBase(true);
    }

    // Основные строительные работы
    public function mainWork()
    {
        echo "Основные строительные работы<br />";
        $this->house->setBuilding(true);
    }

    // Добавление инженерных коммуникаций
    public function addServiceLines()
    {
        echo "Добавление инженерных коммуникаций<br />";
        $this->house->setServiceLines(true);
    }

    // Завершение строительства
    public function finish()
    {
        echo "Завершение строительства<br />";
        $this->house->setFinish(true);
    }

    // Возвращает результат
    public function getResult(): House
    {
        return $this->house;
    }
}
