<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs;

// Класс TileRoof представляет крышу с керамической черепицей.
use Illuminate\Support\Facades\Log;

class TileRoof implements Roof {

    // Метод cover() выполняет покрытие крыши керамической черепицей.
    public function cover(): Roof {
        Log::info("Покрытие крыши керамической черепицей");
        return $this;
    }

    // Метод waterProtect() обеспечивает защиту крыши от воды.
    public function waterProtect(): void {
        Log::channel('sergey')->info("Защита крыши от воды");
    }
}
