<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс PriceBuilder реализует интерфейс Builder и представляет конкретную реализацию строителя для создания объекта Price.
class PriceBuilder implements Builder {
    private int $total;

    // Сброс текущей общей стоимости
    public function reset() {
        $this->total = 0;
    }

    // Добавление стоимости подготовительных работ
    public function prepare() {
        $this->total += 500;
    }

    // Добавление стоимости основных строительных работ
    public function mainWork() {
        $this->total += 1500;
    }

    // Добавление стоимости инженерных коммуникаций
    public function addServiceLines() {
        $this->total += 300;
    }

    // Добавление стоимости завершающих работ
    public function finish() {
        $this->total += 400;
    }

    // Получение общей стоимости
    public function getResult(): int
    {
        return $this->total;
    }
}
