<?php

namespace App\Http\Controllers\PHP8\P443NullObject;

class ProgramP443NullObject
{
    public function index() {
        $r = new UnitAcquisition();
        dd($r->getUnits(1, 5)[1]->bombardStrength());
    }
}
