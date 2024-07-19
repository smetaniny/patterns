<?php

namespace App\Http\Controllers\PHP8\P319FactoryMethod;

class MegaCommsManager extends CommsManager
{
    // Методы для получения верхнего и нижнего колонтитула и объекта ApptEncoder
    public function getHeaderText(): string
    {
        return "Верхний колонтитул MegaAppt <br />";
    }

    public function getApptEncoder(): ApptEncoder
    {
        return new MegaApptEncoder();
    }

    public function getFooterText(): string
    {
        return "Нижний колонтитул MegaAppt <br />";
    }
}
