<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1SP\graph;


// Класс Scene представляет собой сцену, на которой размещаются графические объекты.
class Scene {
    private array $objects = [];
    public static Scene $instance;

    // Приватный конструктор для создания единственного экземпляра сцены.
    private function __construct() {
        $this->objects = [];
    }

    // Получение экземпляра сцены (реализация синглтона).
    public static function getInstance(): Scene {
        if (!isset(self::$instance)) {
            self::$instance = new Scene();
        }
        return self::$instance;
    }

    // Добавление графического объекта на сцену.
    public function add(GraphObject $o) {
        $this->objects[] = $o;
    }

    // Очистка сцены от объектов.
    public function clear() {
        $this->objects = [];
    }

    // Отрисовка всех объектов на сцене.
    public function draw() {
        foreach ($this->objects as $g) {
            $g->draw();
        }
    }
}
