<?php

namespace App\Http\Controllers\PHP8\P313Singleton;

class Preferences
{
    // Приватное свойство для хранения настроек
    private array $props = [];

    // Приватное статическое свойство для хранения единственного экземпляра класса
    private static Preferences $instance;

    private function __construct()
    {
        // Приватный конструктор. Это гарантирует, что объект этого класса нельзя создать извне.
    }

    public static function getInstance(): Preferences
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }

        // Статический метод для получения единственного экземпляра класса
        return self::$instance;
    }

    // Метод для установки значения свойства по ключу
    public function setProperty(string $key, string $val): void
    {
        $this->props[$key] = $val;
    }

    // Метод для получения значения свойства по ключу
    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }
}
