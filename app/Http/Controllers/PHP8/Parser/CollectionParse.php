<?php

namespace App\Http\Controllers\PHP8\Parser;

use Exception;

/**
 * Абстрактный класс CollectionParse представляет собой базовый класс
 * для парсеров, которые содержат коллекцию других парсеров.
 */
abstract class CollectionParse extends Parser
{
    /**
     * @var Parser[] Массив парсеров, которые составляют коллекцию.
     */
    protected array $parsers = [];

    /**
     * Добавляет парсер к коллекции.
     *
     * @param Parser $p Парсер для добавления.
     * @return Parser Добавленный парсер.
     * @throws Exception Если аргумент $p равен null.
     */
    public function add(Parser $p): Parser
    {
        if (is_null($p))
        {
            throw new Exception("Аргумент равен null");
        }

        $this->parsers[] = $p;
        return $p;
    }

    /**
     * {}
     */
    public function term(): bool
    {
        return false;
    }
}
