<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls;

// Класс BrickWall представляет стену из кирпича.
use Illuminate\Support\Facades\Log;

class BrickWall implements Wall {

    // Метод build() выполняет построение стены из кирпича.
    public function build() {
        Log::channel('sergey')->info("Постройка стены из кирпича");
    }
}
