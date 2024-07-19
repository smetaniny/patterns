<?php

namespace App\Http\Controllers\PHP8\P308Employee;

// Класс Minion, который наследуется от Employee
class Minion extends Employee
{
    // Реализация абстрактного метода fire
    public function fire(): void
    {
        // Вывод на экран сообщения о том, что сотрудник убирает со стола, используя его имя
        print "{$this->name}: я уберу со стола <br />";
    }
}
