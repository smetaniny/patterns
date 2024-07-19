<?php

namespace App\Http\Controllers\PHP8\P436Command;

// Класс CommandFactory (Фабрика команд)
use Exception;
use Symfony\Component\Console\Exception\CommandNotFoundException;

class CommandFactory
{
    // Директория, в которой находятся классы команд
    private static string $dir = 'commands';

    // Статический метод для получения объекта команды по имени действия
    /**
     * @throws Exception
     */
    public static function getCommand(string $action = 'Default'): Command
    {
        // Проверка наличия недопустимых символов в имени действия
        if (preg_match('/\W/', $action)) {
            throw new Exception("Неверные символы в команде");
        }

        // Формирование имени класса команды на основе имени действия
        $class = __NAMESPACE__ ."\\". UCFirst(strtolower($action)) . "Command";

        // Проверка существования класса
        if (!class_exists($class)) {
            throw new CommandNotFoundException(
                "Класс '$class' не обнаружен");
        }

        // Создание экземпляра класса команды и возврат его
        $cmd = new $class();
        return $cmd;
    }
}
