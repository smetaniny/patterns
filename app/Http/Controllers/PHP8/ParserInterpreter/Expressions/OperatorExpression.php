<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Expressions;

use App\Http\Controllers\PHP8\ParserInterpreter\Context\InterpreterContext;

/**
 * Абстрактный класс OperatorExpression представляет операторное выражение и расширяет класс Expression.
 */
abstract class OperatorExpression extends Expression
{
    /**
     * Конструктор класса OperatorExpression.
     *
     * @param Expression $l_op Левый операнд.
     * @param Expression $r_op Правый операнд.
     */
    public function __construct(protected Expression $l_op, protected Expression $r_op)
    {
        // Инициализация левого и правого операндов.
    }

    /**
     * Метод interpret интерпретирует операторное выражение.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     */
    public function interpret(InterpreterContext $context): void
    {
        $this->l_op->interpret($context);
        $this->r_op->interpret($context);
        $result_l = $context->lookup($this->l_op);
        $result_r = $context->lookup($this->r_op);
        $this->doInterpret($context, $result_l, $result_r);
    }

    /**
     * Абстрактный метод doInterpret, который должен быть реализован в подклассах для выполнения интерпретации операции.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     * @param mixed $result_l Результат интерпретации левого операнда.
     * @param mixed $result_r Результат интерпретации правого операнда.
     */
    abstract protected function doInterpret(InterpreterContext $context, mixed $result_l, mixed $result_r): void;
}
