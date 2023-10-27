<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс House представляет объект дома и содержит информацию о его строительстве.
use JetBrains\PhpStorm\Pure;

class House {
    // Флаг для базовой части дома
    private bool $base = false;
    // Флаг для состояния строительства
    private bool $building = false;
    // Флаг для дополнительных линий обслуживания
    private bool $serviceLines = false;
    // Флаг для завершения строительства
    private bool $finish = false;

    // Геттер для флага базовой части дома.
    public function isBase(): bool
    {
        return $this->base;
    }

    // Сеттер для флага базовой части дома.
    public function setBase($base) {
        $this->base = $base;
    }

    // Геттер для флага состояния строительства дома.
    public function isBuilding(): bool
    {
        return $this->building;
    }

    // Сеттер для флага состояния строительства дома.
    public function setBuilding($building) {
        $this->building = $building;
    }

    // Геттер для флага дополнительных линий обслуживания.
    public function isServiceLines(): bool
    {
        return $this->serviceLines;
    }

    // Сеттер для флага дополнительных линий обслуживания.
    public function setServiceLines($serviceLines) {
        $this->serviceLines = $serviceLines;
    }

    // Геттер для флага завершения строительства дома.
    public function isFinish(): bool
    {
        return $this->finish;
    }

    // Сеттер для флага завершения строительства дома.
    public function setFinish($finish) {
        $this->finish = $finish;
    }

    // Метод YN возвращает "Да" или "Нет" в зависимости от значения boolean.
    public function YN($r): string
    {
        return $r ? "Да" : "Нет";
    }

    // Переопределенный метод __toString() возвращает информацию о состоянии строительства дома.
    #[Pure] public function __toString() {
        $sb = "Базовая часть : " . $this->YN($this->isBase()) . '<br />';
        $sb .= "Строительство : " . $this->YN($this->isBuilding()) . '<br />';
        $sb .= "Дополнительные линии обслуживания : " . $this->YN($this->isServiceLines()) . '<br />';
        $sb .= "Завершено : " . $this->YN($this->isFinish()) . '<br />';

        return $sb;
    }
}
