<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;

/**
 * Класс VariableHandler реализует интерфейс Handler и предоставляет обработку совпадения для переменных.
 */
class VariableHandler implements Handler
{
    /**
     * Метод handleMatch обрабатывает совпадение, найденное парсером, и создает объект VariableExpression.
     *
     * @param Parser $parser Парсер, который обнаружил совпадение с переменной.
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        // Извлекаем имя переменной из стека результатов
        $varname = $scanner->getContext()->popResult();

        // Создаем объект VariableExpression и помещаем его обратно в стек результатов
        $scanner->getContext()->pushResult(
            new VariableExpression($varname)
        );
    }
}
