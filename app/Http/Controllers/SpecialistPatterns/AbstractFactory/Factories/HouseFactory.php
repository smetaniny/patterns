<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Factories;

use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs\Roof;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Walls\Wall;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows\Window;

// Интерфейс HouseFactory определяет контракт для фабрик, создающих компоненты дома.
interface HouseFactory {
    // Метод для создания стены дома.
    public function createWall(): Wall;

    // Метод для создания крыши дома.
    public function createRoof(): Roof;

    // Метод для создания окна дома.
    public function createWindow(): Window;
}
