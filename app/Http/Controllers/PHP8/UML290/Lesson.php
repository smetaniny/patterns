<?php

namespace App\Http\Controllers\PHP8\UML290;


abstract class Lesson
{
    public const FIXED = 1;
    public const TIMED = 2;
    protected int $duration;
    private int $costType;

    public function __construct(int $duration, int $costType = 1)
    {
        $this->duration = $duration;
        $this->costType = $costType;
    }

    public function cost(): int
    {
        switch ($this->costType) {
            case self::TIMED:
                return (5 * $this->duration);
                break;
            case self::FIXED:
                return 30;
                break;
            default:
                $this->costType = self::FIXED;
                return 30;
        }
    }

    public function chargeType(): string
    {
        switch ($this->costType) {
            case self::TIMED:
                return "Почасовая оплата";
                break;
            case self::FIXED:
                return "Фиксированная ставка";
                break;
            default:
                $this->costType = self::FIXED;
                return "Фиксированная ставка";
        }
    }
}
