<?php

namespace App\Http\Controllers\SpecialistPatterns\Prototype;

// Интерфейс "Prototype" определяет контракт, который должны реализовывать классы-прототипы.
interface Prototype {
    // Метод clone() описывает операцию создания копии объекта.
    public function clone();
}
