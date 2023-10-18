<?php

namespace App\Http\Controllers\PHP8\P395Interpreter;

/**
 * Класс BooleanEqualsExpression представляет операторное выражение для сравнения равенства.
 */
class BooleanEqualsExpression extends OperatorExpression
{
    /**
     * Метод doInterpret реализует интерпретацию оператора сравнения равенства.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     * @param mixed $result_l Результат интерпретации левого операнда.
     * @param mixed $result_r Результат интерпретации правого операнда.
     */
    protected function doInterpret(InterpreterContext $context, mixed $result_l, mixed $result_r): void
    {
        // Выполняем операцию сравнения равенства и заменяем текущее выражение в контексте результатом.
        $context->replace($this, $result_l == $result_r);
    }
}
