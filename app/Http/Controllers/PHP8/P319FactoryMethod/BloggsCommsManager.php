<?php

namespace App\Http\Controllers\PHP8\P319FactoryMethod;

// Класс BloggsCommsManager, наследующий абстрактный класс CommsManager
class BloggsCommsManager extends CommsManager
{
    // Методы для получения верхнего и нижнего колонтитула и объекта ApptEncoder
    public function getHeaderText(): string
    {
        return "Верхний колонтитул BloggsCal <br />";
    }

    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal <br />";
    }
}
