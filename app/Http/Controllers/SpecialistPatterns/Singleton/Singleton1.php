<?php

namespace App\Http\Controllers\SpecialistPatterns\Singleton;

// Класс Singleton1 - пример не потокобезопасного синглтона
class Singleton1 {
    // Приватный конструктор для создания экземпляра
    private function __construct() {
        echo "Singleton 1 создан<br />";
    }

    // Статическое свойство для хранения единственного экземпляра
    private static Singleton1 $instance;

    // Статический метод для получения экземпляра Singleton1
    public static function getInstance(): Singleton1
    {
        // Если экземпляр ещё не создан, создаём его
        if (self::$instance == null) {
            self::$instance = new Singleton1();
        }

        return self::$instance;
    }
}
