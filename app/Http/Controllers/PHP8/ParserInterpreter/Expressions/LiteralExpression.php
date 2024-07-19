<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Expressions;

use App\Http\Controllers\PHP8\ParserInterpreter\Context\InterpreterContext;

/**
 * Класс LiteralExpression представляет литеральное выражение.
 */
class LiteralExpression extends Expression
{
    private mixed $value;

    /**
     * Конструктор класса LiteralExpression.
     *
     * @param mixed $value Значение литерального выражения.
     */
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    /**
     * Метод interpret интерпретирует литеральное выражение и заменяет его значение в контексте.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     */
    public function interpret(InterpreterContext $context): void
    {
        $context->replace($this, $this->value);
    }
}
