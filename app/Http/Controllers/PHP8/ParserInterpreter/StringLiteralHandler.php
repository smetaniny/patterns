<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;


/**
 * Класс StringLiteralHandler реализует интерфейс Handler и предоставляет обработку совпадения строковых литералов.
 */
class StringLiteralHandler implements Handler
{
    /**
     * Метод handleMatch обрабатывает совпадение, найденное парсером, и создает объект LiteralExpression для строковых
     * литералов.
     *
     * @param Parser $parser Парсер, который обнаружил совпадение со строковым литералом.
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        // Извлекаем значение строки из стека результатов
        $value = $scanner->getContext()->popResult();

        // Создаем объект LiteralExpression для строки и помещаем его обратно в стек результатов
        $scanner->getContext()->pushResult(
            new LiteralExpression($value)
        );
    }
}
