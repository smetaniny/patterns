<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Roofs;

// Интерфейс Roof определяет контракт для компонентов, представляющих крышу дома.
interface Roof {
    // Метод cover() выполняет покрытие крыши определенным материалом (например, черепицей).
    public function cover(): Roof;

    // Метод waterProtect() обеспечивает защиту крыши от воды.
    public function waterProtect(): void;
}
