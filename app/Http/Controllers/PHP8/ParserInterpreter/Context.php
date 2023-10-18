<?php

namespace app\Http\Controllers\PHP8\ParserInterpreter;

use Exception;

class Context
{
    public array $resultstack = [];

    /**
     * Добавляет результат анализа в стек результатов.
     *
     * @param mixed $mixed Результат анализа, который нужно добавить в стек.
     */
    public function pushResult($mixed): void
    {
        array_push($this->resultstack, $mixed);
    }

    /**
     * Извлекает и удаляет последний результат из стека результатов.
     *
     * @return mixed Возвращает последний результат из стека.
     */
    public function popResult(): mixed
    {
        return array_pop($this->resultstack);
    }

    /**
     * Возвращает количество результатов в стеке.
     *
     * @return int Количество результатов в стеке.
     */
    public function resultCount(): int
    {
        return count($this->resultstack);
    }

    /**
     * Просматривает последний результат в стеке без его удаления.
     *
     * @return mixed Последний результат в стеке.
     * @throws Exception Исключение, если стек результатов пуст.
     */
    public function peekResult(): mixed
    {
        if (empty($this->resultstack)) {
            throw new Exception("empty resultstack");
        }
        return $this->resultstack[count($this->resultstack) - 1];
    }
}
