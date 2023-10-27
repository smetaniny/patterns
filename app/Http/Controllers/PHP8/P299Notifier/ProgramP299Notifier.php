<?php

namespace App\Http\Controllers\PHP8\P299Notifier;


use App\Http\Controllers\PHP8\P292Strategy\FixedCostStrategy;
use App\Http\Controllers\PHP8\P292Strategy\Lecture;
use App\Http\Controllers\PHP8\P292Strategy\Seminar;
use App\Http\Controllers\PHP8\P292Strategy\TimedCostStrategy;

class ProgramP299Notifier
{
    public function index() {
        $lessons1 = new Seminar(4, new TimedCostStrategy(), "Физика в действии");
        $lessons2 = new Lecture(7, new FixedCostStrategy(), "Карпов Станислав Викторович");
        $mgr = new RegistrationMgr();
        $mgr->register($lessons1);
        $mgr->register($lessons2);
    }
}
