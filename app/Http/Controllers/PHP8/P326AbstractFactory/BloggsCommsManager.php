<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

// Класс BloggsCommsManager, наследующий абстрактный класс CommsManager
class BloggsCommsManager extends CommsManager
{
    // Метод для получения текста верхнего колонтитула.
    public function getHeaderText(): string
    {
        return "Верхний колонтитул BloggsCal <br />";
    }

    // Метод для создания объекта Encoder (кодировщика) в зависимости от переданного флага.
    public function make(int $flag): Encoder
    {
        switch ($flag) {
            case self::APPT:
                // Возвращает объект BloggsEncoder для кодирования событий (приложений).
                return new BloggsEncoder();
            default:
                // По умолчанию также возвращает объект BloggsEncoder.
                return new BloggsEncoder();
        }
    }

    // Метод для получения текста нижнего колонтитула.
    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal <br />";
    }
}
