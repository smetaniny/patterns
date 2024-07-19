<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows;

// Класс PlasticFrameWindow представляет окно с пластиковой рамой.
use Illuminate\Support\Facades\Log;

// Класс WoodFrameWindow представляет окно с деревянной рамой.
class WoodFrameWindow implements Window {

    // Метод open() открывает окно.
    public function open() {
        Log::channel('sergey')->info("Открытие деревянного окна");
    }

    // Метод close() закрывает окно.
    public function close() {
        Log::channel('sergey')->info("Закрытие деревянного окна");
    }

    // Метод install() выполняет установку окна.
    public function install(): Window {
        Log::channel('sergey')->info("Установка деревянного окна");
        return $this;
    }
}
