<?php

namespace App\Http\Controllers\PHP8\P436Command;

// Класс Controller (Контроллер)
use Exception;
use JetBrains\PhpStorm\Pure;

class Controller
{
    private CommandContext $context; // Контекст команды

    // Конструктор класса
    #[Pure] public function __construct()
    {
        // Создаем новый контекст команды
        $this->context = new CommandContext();
    }

    // Метод для получения контекста команды
    public function getContext(): CommandContext
    {
        return $this->context;
    }

    // Метод для обработки команды

    /**
     * @throws Exception
     */
    public function process(): void
    {
        // Получаем имя действия из контекста
        $action = $this->context->get('action');
        // Проверяем, является ли имя действия пустым, и устанавливаем значение по умолчанию
        $action = (is_null($action)) ? "default" : $action;

        // Получаем объект команды из фабрики команд
        $cmd = CommandFactory::getCommand($action);

        // Выполняем команду и обрабатываем результат
        if (!$cmd->execute($this->context)) {
            // Обработка сбоя
        } else {
            // Удачный исход операции
        }
    }
}
