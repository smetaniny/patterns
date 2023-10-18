<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс BooleanAndHandler реализует интерфейс Handler и предоставляет обработку совпадения для оператора "and".
 */
class BooleanAndHandler implements Handler
{
    /**
     * Метод handleMatch обрабатывает совпадение, найденное парсером, и создает объект BooleanAndExpression для оператора "and".
     *
     * @param Parser $parser Парсер, который обнаружил совпадение с оператором "and".
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        // Извлекаем два операнда из стека результатов
        $comp1 = $scanner->getContext()->popResult();
        $comp2 = $scanner->getContext()->popResult();

        // Создаем объект BooleanAndExpression для оператора "and" и помещаем его обратно в стек результатов
        $scanner->getContext()->pushResult(
            new BooleanAndExpression($comp1, $comp2)
        );
    }
}
