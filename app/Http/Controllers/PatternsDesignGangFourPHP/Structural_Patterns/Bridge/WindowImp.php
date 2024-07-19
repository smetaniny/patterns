<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Structural_Patterns\Bridge;

use App\Http\Controllers\PatternsDesignGangFourPHP\Foundation_Classes\Coord;
use App\Http\Controllers\PatternsDesignGangFourPHP\Foundation_Classes\Point;

/**
 * Интерфейс WindowImp определяет методы для рисования на окнах.
 */
interface WindowImp {
    /**
     * Метод для отображения верхней части окна.
     */
    public function impTop();

    /**
     * Метод для отображения нижней части окна.
     */
    public function impBottom();

    /**
     * Метод для установки размеров окна.
     *
     * @param Point $point Точка с координатами размеров.
     */
    public function impSetExtent(Point $point);

    /**
     * Метод для установки точки начала координат окна.
     *
     * @param Point $point Точка с координатами начала координат.
     */
    public function impSetOrigin(Point $point);

    /**
     * Метод для рисования прямоугольника на окне.
     *
     * @param Coord $coord1 Координата вершины прямоугольника.
     * @param Coord $coord2 Координата вершины прямоугольника.
     * @param Coord $coord3 Координата вершины прямоугольника.
     * @param Coord $coord4 Координата вершины прямоугольника.
     */
    public function DeviceRect(Coord $coord1, Coord $coord2, Coord $coord3, Coord $coord4);

    /**
     * Метод для вывода текста на окне.
     *
     * @param string $text Текст для вывода.
     * @param Coord $coord1 Координата вывода текста.
     * @param Coord $coord2 Координата вывода текста.
     */
    public function DeviceText(string $text, Coord $coord1, Coord $coord2);

    /**
     * Метод для вывода изображения на окне.
     *
     * @param string $bitmap Название изображения.
     * @param Coord $coord1 Координата вывода изображения.
     * @param Coord $coord2 Координата вывода изображения.
     */
    public function DeviceBitmap(string $bitmap, Coord $coord1, Coord $coord2);

    // еще много функций для рисования на окнах...
}
