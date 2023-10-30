<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows;


// Класс PlasticFrameWindow представляет окно с пластиковой рамой.
use Illuminate\Support\Facades\Log;

class PlasticFrameWindow implements Window {

    // Метод open() открывает окно.
    public function open() {
        Log::channel('sergey')->info("Открытие пластикового окна");
    }

    // Метод close() закрывает окно.
    public function close() {
        Log::channel('sergey')->info("Закрытие пластикового окна");
    }

    // Метод install() выполняет установку окна.
    public function install(): Window {
        Log::channel('sergey')->info("Установка пластикового окна");
        return $this;
    }
}
