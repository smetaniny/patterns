<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy;

/**
 * Класс Composition представляет композицию объектов.
 */
class Composition
{
    // Композитор
    protected Compositor $compositor;
    // Ширина линии
    protected int $lineWidth = 0; // Инициализируем значение ширины линии
    // Список компонентов
    protected array $components = [];

    /**
     * Конструктор класса Composition.
     *
     * @param Compositor $compositor
     */
    public function __construct(Compositor $compositor)
    {
        // Устанавливаем композитор
        $this->compositor = $compositor;
    }

    /**
     * Метод для добавления компонентов.
     *
     * @param $component
     */
    public function addComponent($component)
    {
        // Добавляем компонент в список
        $this->components[] = $component;
    }

    /**
     * Метод для восстановления композиции.
     */
    public function repair()
    {
        // Подготавливаем массивы с размерами компонентов
        $natural = [];
        // Подготавливаем массивы с коэффициентами удлинения компонентов
        $stretchability = [];
        // Подготавливаем массивы с коэффициентами сжатия компонентов
        $shrinkability = [];
        // Получаем количество компонентов
        $componentCount = count($this->components);
        // Подготавливаем массив для хранения местоположения разрывов
        $breaks = [];

        // Определяем местоположение переносов строк
        $breakCount = $this->compositor->compose(
            $natural, $stretchability, $shrinkability,
            $componentCount, $this->lineWidth, $breaks
        );

        // Выводим количество разрывов
        echo "Количество разрывов: $breakCount<br />";
    }
}
