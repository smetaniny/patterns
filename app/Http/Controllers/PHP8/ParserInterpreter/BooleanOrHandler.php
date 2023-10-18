<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;

/**
 * Класс BooleanOrHandler реализует интерфейс Handler и предоставляет обработку совпадения для оператора "or".
 */
class BooleanOrHandler implements Handler
{
    /**
     * Метод handleMatch обрабатывает совпадение, найденное парсером, и создает объект BooleanOrExpression для оператора "or".
     *
     * @param Parser $parser Парсер, который обнаружил совпадение с оператором "or".
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        // Извлекаем два операнда из стека результатов
        $comp1 = $scanner->getContext()->popResult();
        $comp2 = $scanner->getContext()->popResult();

        // Создаем объект BooleanOrExpression для оператора "or" и помещаем его обратно в стек результатов
        $scanner->getContext()->pushResult(
            new BooleanOrExpression($comp1, $comp2)
        );
    }
}
