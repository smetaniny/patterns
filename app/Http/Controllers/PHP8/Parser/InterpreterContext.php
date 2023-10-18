<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс InterpreterContext представляет контекст интерпретации и хранит значения выражений.
 */
class InterpreterContext
{
    private array $expressionstore = [];

    /**
     * Метод replace заменяет значение выражения в контексте.
     *
     * @param Expression $exp Выражение, которое нужно заменить.
     * @param mixed $value Значение, которым нужно заменить выражение.
     */
    public function replace(Expression $exp, mixed $value): void
    {
        $this->expressionstore[$exp->getKey()] = $value;
    }

    /**
     * Метод lookup возвращает значение выражения из контекста.
     *
     * @param Expression $exp Выражение, значение которого нужно получить.
     *
     * @return mixed Значение выражения.
     */
    public function lookup(Expression $exp): mixed
    {
        return $this->expressionstore[$exp->getKey()];
    }
}
