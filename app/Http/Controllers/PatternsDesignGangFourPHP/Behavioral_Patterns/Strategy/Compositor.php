<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Интерфейс Compositor определяет методы для композиции объектов.
 */
interface Compositor
{
    /**
     * Метод для композиции объектов.
     *
     * @param Coord[] $natural Массив координат естественных размеров.
     * @param Coord[] $stretchability Массив координат удлиняемости.
     * @param Coord[] $shrinkability Массив координат усадки.
     * @param int $componentCount Количество компонентов.
     * @param int $lineWidth Ширина линии.
     * @param int[] $breaks Массив разрывов.
     * @return int Количество разрывов.
     */
    public function compose(array $natural, array $stretchability, array $shrinkability, int $componentCount, int $lineWidth, array &$breaks): int;
}
