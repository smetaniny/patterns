<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Абстрактный класс ProcessRequest представляет собой базовый класс для процессов обработки запросов.
 * Этот класс определяет абстрактный метод process(), который должен быть реализован в подклассах для обработки запросов.
 */
abstract class ProcessRequest
{
    /**
     * Абстрактный метод, который должен быть реализован в подклассах для обработки запросов.
     *
     * @param RequestHelper $req Объект RequestHelper, предоставляющий информацию о запросе.
     */
    abstract public function process(RequestHelper $req): void;
}
