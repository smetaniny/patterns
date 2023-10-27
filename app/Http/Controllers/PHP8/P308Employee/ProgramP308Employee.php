<?php

namespace App\Http\Controllers\PHP8\P308Employee;

class ProgramP308Employee
{
    public function index() {
        $boss = new NastyBoss();
        $boss->addEmployee(Employee::recruit("Игорь"));
        $boss->addEmployee(Employee::recruit("Владимир"));
        $boss->addEmployee(Employee::recruit("Мария"));
        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();
    }
}
