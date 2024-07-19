<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Expressions;

use App\Http\Controllers\PHP8\ParserInterpreter\Context\InterpreterContext;

/**
 * Абстрактный класс Expression представляет выражение и объявляет метод interpret для его интерпретации.
 */
abstract class Expression
{
    private static int $keycount = 0;
    private string $key;

    /**
     * Метод interpret должен быть реализован в подклассах для интерпретации выражения.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     */
    abstract public function interpret(InterpreterContext $context);

    /**
     * Метод getKey генерирует уникальный ключ для выражения и возвращает его.
     *
     * @return string Уникальный ключ для выражения.
     */
    public function getKey(): string
    {
        if (!isset($this->key)) {
            self::$keycount++;
            $this->key = (string) self::$keycount;
        }
        return $this->key;
    }
}
