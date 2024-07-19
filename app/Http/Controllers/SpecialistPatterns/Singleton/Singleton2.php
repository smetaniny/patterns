<?php

namespace App\Http\Controllers\SpecialistPatterns\Singleton;


// Класс Singleton2 - потокобезопасный синглтон без ленивой инициализации, параметров и обработки исключений
class Singleton2 {
    // Приватный конструктор для создания единственного экземпляра
    private function __construct() {
        echo "Singleton 2 создан<br />";
    }

    // Статическое свойство для хранения экземпляра
    private static ?Singleton2 $instance = null;

    // Статический метод для получения экземпляра Singleton2
    public static function getInstance(): ?Singleton2
    {
        // Если экземпляр еще не создан, создаем его
        if (self::$instance == null) {
            self::$instance = new Singleton2();
        }

        return self::$instance;
    }
}
