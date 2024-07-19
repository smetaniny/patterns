<?php

namespace App\Http\Controllers\SpecialistPatterns\Singleton;

// Класс Singleton3 - потокобезопасный синглтон с использованием синхронизации, что может повлиять на производительность
class Singleton3
{
    // Статическое свойство для хранения экземпляра
    private static Singleton3 $instance;

    // Приватный конструктор для создания единственного экземпляра
    private function __construct()
    {
        echo "Singleton 3 создан<br />";
    }

    // Статический метод для получения экземпляра Singleton3 с синхронизацией
    public static function getInstance(): Singleton3
    {
        // Используем блок синхронизации для обеспечения потокобезопасности
        if (self::$instance == null) {
            self::$instance = new Singleton3();
        }

        return self::$instance;
    }
}
