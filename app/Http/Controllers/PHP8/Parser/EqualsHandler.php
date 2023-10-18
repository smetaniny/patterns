<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс EqualsHandler реализует интерфейс Handler и предоставляет обработку совпадения для оператора "equals".
 */
class EqualsHandler implements Handler
{
    /**
     * Метод handleMatch обрабатывает совпадение, найденное парсером, и создает объект BooleanEqualsExpression для оператора "equals".
     *
     * @param Parser $parser Парсер, который обнаружил совпадение с оператором "equals".
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        // Извлекаем два операнда из стека результатов
        $comp1 = $scanner->getContext()->popResult();
        $comp2 = $scanner->getContext()->popResult();

        // Создаем объект BooleanEqualsExpression для оператора "equals" и помещаем его обратно в стек результатов
        $scanner->getContext()->pushResult(
            new BooleanEqualsExpression($comp1, $comp2)
        );
    }
}
