<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;

// Абстрактная фабрика для создания графических объектов
abstract class AbstractGOFactory {

    // Метод для создания точки
    public abstract function createPoint(): Point;

    // Метод для создания окружности
    public abstract function createCircle(): Circle;
}
