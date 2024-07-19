<?php

namespace App\Http\Controllers\SOLID\L2;

class Ostrich extends Bird
{
    public function fly()
    {
        return "Страус не умеет летать.";
    }
}
