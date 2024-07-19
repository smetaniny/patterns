<?php

namespace App\Http\Controllers\PHP8\P308Employee;

class WellConnected extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: я позвоню папе <br />";
    }
}
