<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Абстрактный класс DecorateProcess представляет собой абстрактный декоратор для процессов обработки запросов.
 * Этот класс наследуется от класса ProcessRequest и обеспечивает базовую структуру для всех конкретных декораторов.
 */
abstract class DecorateProcess extends ProcessRequest
{
    /**
     * Конструктор класса DecorateProcess. Принимает другой объект ProcessRequest в качестве параметра и сохраняет его для последующего использования.
     *
     * @param ProcessRequest $processrequest Объект ProcessRequest, который будет декорирован.
     */
    public function __construct(protected ProcessRequest $processrequest)
    {
    }
}
