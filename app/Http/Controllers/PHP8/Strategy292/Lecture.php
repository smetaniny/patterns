<?php

namespace App\Http\Controllers\PHP8\Strategy292;

// Класс Lecture, наследующий абстрактный класс Lesson.
use JetBrains\PhpStorm\Pure;

// Лекция
class Lecture extends Lesson
{
    // Имя ректора
    private string $rectorName;

    #[Pure] public function __construct(int $duration, CostStrategy $costStrategy, string $rectorName)
    {
        parent::__construct($duration, $costStrategy);
        $this->rectorName = $rectorName;
    }

    // Метод, специфичный для семинара, который возвращает имя ректора.
    public function getRector(): string
    {
        return $this->rectorName;
    }
}
