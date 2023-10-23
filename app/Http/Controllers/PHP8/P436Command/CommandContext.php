<?php

namespace App\Http\Controllers\PHP8\P436Command;

// Класс CommandContext (Контекст команды)
class CommandContext
{
    // Массив параметров контекста
    private array $params = [];
    // Строка для хранения ошибки
    private string $error = "";

    public function __construct()
    {
        // Конструктор класса
        // Инициализирует параметры контекста значениями из $_REQUEST
        $this->params = $_REQUEST;
    }

    // Метод для добавления параметра в контекст по ключу
    public function addParam(string $key, $val): void
    {
        $this->params[$key] = $val;
    }

    // Метод для получения значения из контекста по ключу
    public function get(string $key): string
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }

        // Возвращаем пустую строку, если ключ отсутствует
        return "";
    }

    // Метод для установки ошибки в контексте
    public function setError($error)
    {
        $this->error = $error;
    }

    // Метод для получения строки с ошибкой из контекста
    public function getError(): string
    {
        return $this->error;
    }
}
