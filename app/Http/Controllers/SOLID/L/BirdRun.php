<?php

namespace App\Http\Controllers\SOLID\L;

use JetBrains\PhpStorm\Pure;

class BirdRun
{
    private Bird $bird;

    public function __construct(Bird $bird)
    {
        $this->bird = $bird;
    }

    #[Pure] public function run() {
        //Получаем скорость передвижения птички
        $flySpeed = $this->bird->fly();
        //...
    }

}
