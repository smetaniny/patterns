<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Foundation_Classes;

/**
 * Класс Point представляет точку.
 */
class Point
{
    public static Point $Zero;

    private float $x;
    private float $y;

    // Статический конструктор для инициализации переменной Zero
    public static function init() {
        self::$Zero = new Point(0.0, 0.0);
    }

    /**
     * Конструктор класса Point.
     *
     * @param float $x Координата X.
     * @param float $y Координата Y.
     */
    public function __construct(float $x = 0.0, float $y = 0.0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Получение координаты X.
     *
     * @return float Координата X.
     */
    public function x()
    {
        return $this->x;
    }

    /**
     * Установка координаты X.
     *
     * @param float $x Координата X.
     */
    public function setX(float $x)
    {
        $this->x = $x;
    }

    /**
     * Получение координаты Y.
     *
     * @return float Координата Y.
     */
    public function y()
    {
        return $this->y;
    }

    /**
     * Установка координаты Y.
     *
     * @param float $y Координата Y.
     */
    public function setY(float $y)
    {
        $this->y = $y;
    }

    // Определение остальных методов класса
}

// Инициализация статического поля Zero
Point::init();
