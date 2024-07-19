<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

// Абстрактный класс CommsManager, определяющий интерфейс для всех менеджеров связи
abstract class CommsManager
{
    // Константы для определения типов коммуникации
    public const APPT = 1;
    public const TTD = 2;
    public const CONTACT = 3;

    // Абстрактные методы, которые должны быть реализованы в подклассах
    abstract public function getHeaderText(): string;
    abstract public function make(int $flag_int): Encoder;
    abstract public function getFooterText(): string;
}
