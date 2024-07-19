<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs;

// Класс WoodRoof представляет крышу с деревянной отделкой.
use Illuminate\Support\Facades\Log;

class WoodRoof implements Roof
{

    // Метод cover() выполняет покрытие крыши деревянной отделкой.
    public function cover(): Roof
    {
        Log::channel('sergey')->info("Покрытие крыши деревянной отделкой");
        return $this;
    }

    // Метод waterProtect() обеспечивает защиту крыши от воды.
    public function waterProtect(): void
    {
        Log::channel('sergey')->info("Защита крыши от воды");
    }
}
