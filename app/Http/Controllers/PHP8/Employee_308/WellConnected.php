<?php

namespace App\Http\Controllers\PHP8\Employee_308;

class WellConnected extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: я позвоню папе <br />";
    }
}
