<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

// Класс Scene представляет собой графическую сцену, на которой можно размещать различные графические объекты.
class Scene {
    private static ?Scene $instance = null; // Статическая переменная для хранения единственного экземпляра сцены
    protected array $objects = array(); // Массив для хранения графических объектов
    private array $observers = array(); // Массив для хранения наблюдателей

    // Приватный конструктор, чтобы предотвратить создание объектов снаружи
    private function __construct() {
    }

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
    public function registerObserver(Observer $observer) {
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

