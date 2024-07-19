<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory\Windows;

// Интерфейс Window определяет контракт для компонентов окон дома.
interface Window {
    // Метод open() открывает окно.
    public function open();

    // Метод close() закрывает окно.
    public function close();

    // Метод install() выполняет установку окна.
    public function install(): Window;
}
