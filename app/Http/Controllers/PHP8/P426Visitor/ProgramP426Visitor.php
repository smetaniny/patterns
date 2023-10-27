<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

class ProgramP426Visitor
{
    public function index() {
        $main_army = new \App\Http\Controllers\PHP8\P426Visitor\Army();
        $main_army->addUnit(new \App\Http\Controllers\PHP8\P426Visitor\Archer());
        $main_army->addUnit(new \App\Http\Controllers\PHP8\P426Visitor\LaserCannonUnit());
        //    $main_army->addUnit(new Cavalry());
        $textdump = new TextDumpArmyVisitor();
        $main_army->accept($textdump);
        print $textdump->getText();

    }
}
