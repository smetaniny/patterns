<?php

namespace App\Http\Controllers\SpecialistPatterns\Singleton;

// Класс Singleton4 - потокобезопасный синглтон с использованием "Double-Checked Locking"
class Singleton4
{
    // Приватное статическое свойство для хранения экземпляра
    private static Singleton4 $instance;

    // Приватный конструктор для создания экземпляра
    private function __construct()
    {
        echo "Singleton 4 создан<br />";
    }

    // Статический метод для получения экземпляра Singleton4 с использованием "Double-Checked Locking"
    public static function getInstance(): Singleton4
    {
        // Проверка, требующая синхронизации только при отсутствии экземпляра
        if (self::$instance == null) {
            self::$instance = new Singleton4();
        }

        return self::$instance;
    }
}

