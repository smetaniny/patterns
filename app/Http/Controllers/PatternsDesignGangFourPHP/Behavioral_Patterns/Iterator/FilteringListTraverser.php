<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

class FilteringListTraverser
{
    private $iterator;

    public function __construct(ListIterator $iterator)
    {
        $this->iterator = $iterator;
    }

    public function traverse()
    {
        $result = false;

        // Получаем итератор списка
        $iterator = $this->iterator;

        // Перебираем элементы списка
        for ($iterator->first(); !$iterator->isDone(); $iterator->next()) {
            // Проверяем элемент с помощью функции TestItem
            if ($this->testItem($iterator->currentItem())) {
                // Если элемент прошел проверку, обрабатываем его с помощью функции ProcessItem
                $result = $this->processItem($iterator->currentItem());

                // Если результат обработки равен false, выходим из цикла
                if ($result === false) {
                    break;
                }
            }
        }

        return $result;
    }

    // Функция для проверки элемента
    private function testItem($item)
    {
        // Ваша логика проверки элемента
    }

    // Функция для обработки элемента
    private function processItem($item)
    {
        // Ваша логика обработки элемента
    }
}
