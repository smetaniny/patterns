<?php

namespace App\Http\Controllers\PHP8\P365Composite;

class ProgramP365Composite
{
    public function index() {
        // Создание армии
        $main_army = new Army();

        // Добавление юнитов
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCannonUnit());

        // Создание новой армии
        $sub_army = new Army();

        // Добавление юнитов
        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());

        // Добавление второй армии в первую
        $main_army->addUnit($sub_army);

        // Все вычисления выполняются "за кулисами"
        print "Атака с силой: {$main_army->bombardStrength()} <br />";
    }
}
