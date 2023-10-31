<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge\ui;


use App\Http\Controllers\SpecialistPatterns\Bridge\platforms\Database;
use JetBrains\PhpStorm\Pure;

// Создаем класс AdminInterface, который наследуется от UserInterface
class AdminInterface extends UserInterface
{
    /**
     * Конструктор класса AdminInterface.
     * @param Database $db Объект базы данных, который используется в интерфейсе.
     */
    #[Pure] public function __construct(Database $db)
    {
        // Вызов конструктора родительского класса (UserInterface)
        parent::__construct($db);
    }

    /**
     * Переопределенный метод для получения роли пользователя.
     * @return string Роль пользователя, в данном случае "Администратор".
     */
    public function getRole(): string
    {
        return "Администратор"; // Возвращает роль администратора
    }
}
