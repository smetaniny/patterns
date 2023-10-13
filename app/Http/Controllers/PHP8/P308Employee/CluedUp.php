<?php

namespace App\Http\Controllers\PHP8\Employee_308;

class CluedUp extends Employee
{

    public function fire(): void
    {
        print "{$this->name}: я вызову адвоката <br />";
    }
}
