<?php

namespace App\Http\Controllers\PHP8\P308Employee;

class CluedUp extends Employee
{

    public function fire(): void
    {
        print "{$this->name}: я вызову адвоката <br />";
    }
}
