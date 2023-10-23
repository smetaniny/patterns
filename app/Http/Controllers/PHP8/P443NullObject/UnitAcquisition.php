<?php

namespace App\Http\Controllers\PHP8\P443NullObject;

use App\Http\Controllers\PHP8\P426Visitor\Archer;
use App\Http\Controllers\PHP8\P426Visitor\Army;
use App\Http\Controllers\PHP8\P426Visitor\LaserCannonUnit;

// Класс UnitAcquisition (Получение юнитов)
class UnitAcquisition
{
    // Метод getUnits() получает юнитов на заданных координатах X и Y
    public function getUnits(int $x, int $y): array
    {
        // Создаем объект Army (Армия) и добавляем в нее объект Archer (Лучник)
        $army = new Army();
        $army->addUnit(new Archer());

        // Формируем массив $found, включая объекты LaserCannonUnit, NullUnit и Army
        $found = [
            new LaserCannonUnit(), // Объект LaserCannonUnit (Лазерная пушка)
            new NullUnit(), // Пустой объект NullUnit (похоже, это паттерн "Null Object")
            $army // Объект Army (Армия)
        ];

        return $found; // Возвращаем массив с найденными юнитами
    }
}
