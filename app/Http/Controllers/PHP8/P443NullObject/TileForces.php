<?php

namespace App\Http\Controllers\PHP8\P443NullObject;

// Класс TileForces (Силы на плитке)
class TileForces
{
    private int $x; // Координата X плитки
    private int $y; // Координата Y плитки
    private array $units = []; // Массив объектов юнитов на плитке

    // Конструктор класса, который принимает координаты и объект UnitAcquisition
    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x; // Устанавливаем координату X
        $this->y = $y; // Устанавливаем координату Y
        $this->units = $acq->getUnits($this->x, $this->y); // Получаем юнитов из объекта UnitAcquisition
    }

    // Метод firepower() вычисляет общую огневую мощность всех юнитов на плитке
    public function firepower(): int
    {
        $power = 0; // Переменная для хранения общей огневой мощности

        // Проходим по массиву юнитов и суммируем их силу удара
        foreach ($this->units as $unit) {
            $power += $unit->bombardStrength();
        }

        return $power; // Возвращаем общую огневую мощность
    }
}
