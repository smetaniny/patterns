<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс Documentation представляет объект документации и содержит информацию о создании документации.
use JetBrains\PhpStorm\Pure;

class Documentation {
    // Флаг для базовой документации
    private bool $base = false;
    // Флаг для состояния строительства
    private bool $building = false;
    // Флаг для дополнительных линий обслуживания
    private bool $serviceLines = false;
    // Флаг для завершения
    private bool $finish = false;

    // Геттер для флага базовой документации.
    public function isBase(): bool
    {
        return $this->base;
    }

    // Сеттер для флага базовой документации.
    public function setBase($base) {
        $this->base = $base;
    }

    // Геттер для флага состояния строительства.
    public function isBuilding(): bool
    {
        return $this->building;
    }

    // Сеттер для флага состояния строительства.
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

    // Геттер для флага завершения.
    public function isFinish(): bool
    {
        return $this->finish;
    }

    // Сеттер для флага завершения.
    public function setFinish($finish) {
        $this->finish = $finish;
    }

    // Метод YN возвращает "Да" или "Нет" в зависимости от значения boolean.
    public function YN($r): string
    {
        return $r ? "Да" : "Нет";
    }

    // Переопределенный метод __toString() возвращает информацию о состоянии документации.
    #[Pure] public function __toString() {
        $result = "Базовая документация : " . $this->YN($this->isBase()) . '<br />';
        $result .= "Строительство : " . $this->YN($this->isBuilding()) . '<br />';
        $result .= "Дополнительные линии обслуживания : " . $this->YN($this->isServiceLines()) . '<br />';
        $result .= "Завершено : " . $this->YN($this->isFinish()) . '<br />';

        return $result;
    }
}
