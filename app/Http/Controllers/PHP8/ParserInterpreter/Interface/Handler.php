<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Interface;

use App\Http\Controllers\PHP8\ParserInterpreter\Parsers\Parser;
use App\Http\Controllers\PHP8\ParserInterpreter\Scanner\Scanner;

/**
 * Интерфейс Handler определяет методы, которые должны быть реализованы классами-обработчиками.
 */
interface Handler
{
    /**
     * Метод handleMatch предназначен для обработки совпадения, найденного парсером в тексте.
     *
     * @param Parser $parser Парсер, который обнаружил совпадение.
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    public function handleMatch(
        Parser $parser,
        Scanner $scanner
    ): void;
}
