<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls;

// Класс WoodWall представляет стену из дерева.
use Illuminate\Support\Facades\Log;

class WoodWall implements Wall {

    // Метод build() выполняет построение стены из дерева.
    public function build() {
        Log::channel('sergey')->info("Постройка стены из дерева");
    }
}
