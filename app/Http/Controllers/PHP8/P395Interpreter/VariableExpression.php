<?php

namespace App\Http\Controllers\PHP8\P395Interpreter;

/**
 * Класс VariableExpression представляет переменное выражение.
 */
class VariableExpression extends Expression
{
    /**
     * Конструктор класса VariableExpression.
     *
     * @param string $name Имя переменной.
     * @param mixed $val Значение переменной (по умолчанию null).
     */
    public function __construct(private string $name, private mixed $val = null)
    {
        // Инициализация имени переменной и значения (по умолчанию).
    }

    /**
     * Метод interpret интерпретирует переменное выражение.
     *
     * @param InterpreterContext $context Контекст интерпретации.
     */
    public function interpret(InterpreterContext $context)
    {
        if (!is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }

    /**
     * Метод setValue устанавливает значение переменной.
     *
     * @param mixed $value Значение переменной.
     */
    public function setValue(mixed $value): void
    {
        $this->val = $value;
    }

    /**
     * Метод getKey возвращает имя переменной в качестве ключа.
     *
     * @return string Имя переменной как ключ.
     */
    public function getKey(): string
    {
        return $this->name;
    }
}
