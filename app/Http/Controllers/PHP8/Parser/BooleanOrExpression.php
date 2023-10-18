<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс BooleanOrExpression представляет операторное выражение для логической операции "или" (OR).
 */
class BooleanOrExpression extends OperatorExpression
{
    /**
     * Метод doInterpret реализует интерпретацию операции "или" (OR).
     *
     * @param InterpreterContext $context Контекст интерпретации.
     * @param mixed $result_l Результат интерпретации левого операнда.
     * @param mixed $result_r Результат интерпретации правого операнда.
     */
    protected function doInterpret(InterpreterContext $context, mixed $result_l, mixed $result_r): void
    {
        // Выполняем операцию "или" (OR) и заменяем текущее выражение в контексте результатом.
        $context->replace($this, $result_l || $result_r);
    }
}
