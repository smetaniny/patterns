<?php

namespace App\Http\Controllers\PHP8\P395Interpreter;

class ProgramP395Interpreter
{
    public function index() {
        // Создаем контекст интерпретатора.
        $context = new InterpreterContext();
        // Создаем переменное выражение.
        $input = new VariableExpression('input');

        // Создаем операторное выражение, которое проверяет, равно ли значение input строке 'четыре' или числу 4.
        $statement = new BooleanOrExpression(
            new BooleanEqualsExpression(new LiteralExpression('четыре'), $input),
            new BooleanEqualsExpression($input, new LiteralExpression(4))
        );

        // Перебираем массив значений.
        foreach (["четыре", 4, "52"] as $val) {
            // Устанавливаем значение переменной input.
            $input->setValue($val);
            print "$val:<br />";

            // Интерпретируем операторное выражение и проверяем, верное ли условие.
            $statement->interpret($context);

            if ($context->lookup($statement)) {
                print "Правильный ответ!<br />";
            } else {
                print "Вы ошиблись!<br />";
            }
        }
    }
}
