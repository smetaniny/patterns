<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

/**
 * Класс ListClass представляет собой структуру данных, которая хранит элементы в виде массива.
 * Он реализует паттерн "Итератор", предоставляя методы для добавления элементов,
 * получения элемента по индексу и подсчета количества элементов.
 */
class ListClass
{
    /**
     * Массив элементов
     */
    private array $items;

    /**
     * Конструктор класса ListClass
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * Метод для добавления элемента в список
     *
     * @param mixed $item Элемент для добавления
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * Метод для получения элемента из списка по индексу
     *
     * @param int $index Индекс элемента
     * @return mixed Возвращаемый элемент
     */
    public function getItem($index)
    {
        return $this->items[$index];
    }

    /**
     * Метод для подсчета количества элементов в списке
     *
     * @return int Количество элементов в списке
     */
    public function count()
    {
        return count($this->items);
    }
}
