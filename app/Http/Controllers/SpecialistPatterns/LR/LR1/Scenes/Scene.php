<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\GraphObject;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Interface\ObserverInterface;

// Класс Scene представляет собой графическую сцену, на которой можно размещать различные графические объекты.
class Scene {
    protected static ?Scene $instance = null; // Статическая переменная для хранения единственного экземпляра сцены
    protected array $objects = array(); // Массив для хранения графических объектов
    protected array $observers = array(); // Массив для хранения наблюдателей

    // Получение экземпляра класса Scene (реализация синглтона)
    public static function getInstance(): ?Scene
    {
        if (self::$instance === null) {
            self::$instance = new Scene();
        }
        return self::$instance;
    }

    // Добавление графического объекта в сцену
    public function addObject(GraphObject $object) {
        $this->objects[] = $object;
    }

    // Регистрация наблюдателя (графического объекта) для наблюдения за сценой
    public function registerObserver(ObserverInterface $observer) {
        $this->observers[] = $observer;
    }

    // Уведомление наблюдателей о добавлении объекта в сцену
    public function notifyObservers(GraphObject $object) {
        foreach ($this->observers as $observer) {
            $observer->update($object);
        }
    }

    // Отображение содержимого сцены
    public function render() {
        echo "Отображение сцены:<br />";
        foreach ($this->objects as $object) {
            $object->draw();
        }
    }
}

