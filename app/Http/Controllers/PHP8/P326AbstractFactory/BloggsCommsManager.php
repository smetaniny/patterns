<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

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
                return new BloggsEncoder();
            default :
                return new BloggsEncoder();
        }
    }

    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal <br />";
    }
}

