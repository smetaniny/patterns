<?php

namespace App\Http\Controllers\PHP8\FactoryMethod319;

// Абстрактный класс CommsManager, определяющий интерфейс для всех менеджеров связи
abstract class CommsManager
{
    abstract public function getHeaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder;
    abstract public function getFooterText(): string;
}
