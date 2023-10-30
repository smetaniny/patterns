<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls;

// Интерфейс Wall определяет контракт для компонентов стен дома.
interface Wall {
    // Метод build() описывает процесс построения стены.
    public function build();
}
