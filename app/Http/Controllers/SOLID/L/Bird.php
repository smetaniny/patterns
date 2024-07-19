<?php

namespace App\Http\Controllers\SOLID\L;

/**
 * Реально используемый в коде класс
 */
class Bird
{
    public function fly(): int
    {
        //Скорость полета птички
        return 10;
    }
}


/**
 * Класс утка.
 * Бизнес логика расширилась и нам пришлось создать потомка от класса Bird.
 * Не изменяет поведение, но дополняет.
 * Не нарушает принцип LSP.
 *
 */

class Duck extends Bird {
    //Скорость полета птички
    public function fly(): int
    {
        return 8; // Не изменяет поведение родительского fly()
    }

    //Скорость плавания утки
    public function swim(): int
    {
        return 2;
    }
}
