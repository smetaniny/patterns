<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;

/**
 * Абстрактный класс Marker представляет общий интерфейс для стратегий маркировки тестов или ответов.
 */
abstract class Marker
{
    /**
     * Конструктор класса Marker.
     *
     * @param string $test Имя теста или описание стратегии маркировки.
     */
    public function __construct(protected string $test)
    {
        // Инициализация имени теста или описания стратегии.
    }

    /**
     * Абстрактный метод mark определяет метод маркировки для конкретной стратегии.
     *
     * @param string $response Ответ или данные, которые требуется маркировать.
     * @return bool Возвращает true, если маркировка успешна, в противном случае - false.
     */
    abstract public function mark(string $response): bool;
}
