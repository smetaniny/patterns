<?php

namespace App\Http\Controllers\PHP8\Strategy292;

// Класс Seminar, наследующий абстрактный класс Lesson.
use JetBrains\PhpStorm\Pure;

// Семинар
class Seminar extends Lesson
{
    // Тема семинара
    private string $topic;

    #[Pure] public function __construct(int $duration, CostStrategy $costStrategy, string $topic)
    {
        parent::__construct($duration, $costStrategy);
        $this->topic = $topic;
    }

    // Метод, специфичный для семинара, который возвращает тему семинара.
    public function getTopic(): string
    {
        return $this->topic;
    }

    // Переопределение метода cost() для семинара, используя собственную логику.
    public function cost(): int
    {
        // Предположим, что семинары стоят в 1.5 раза дороже чем обычные уроки.
        $baseCost = parent::cost();
        return (int) ($baseCost * 5);
    }
}
