<?php

namespace App\Http\Controllers\PHP8\AbstractFactory326;

// Абстрактный класс CommsManager, определяющий интерфейс для всех менеджеров связи
abstract class CommsManager
{
    public const APPT = 1;
    public const TTD = 2;
    public const CONTACT = 3;
    abstract public function getHeaderText(): string;
    abstract public function make(int $flag_int): Encoder;
    abstract public function getFooterText(): string;

}
