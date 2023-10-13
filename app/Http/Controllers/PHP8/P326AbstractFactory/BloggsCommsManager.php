<?php

namespace App\Http\Controllers\PHP8\AbstractFactory326;

// Класс BloggsCommsManager, наследующий абстрактный класс CommsManager

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "Верхний колонтитул BloggsCal <br />";
    }

    public function make(int $flag): Encoder
    {
        switch ($flag) {
            case self::APPT:
                return new BloggsApptEncoder();
            default :
                return new BloggsApptEncoder();
        }
    }

    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal <br />";
    }
}

