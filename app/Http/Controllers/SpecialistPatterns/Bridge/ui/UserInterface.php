<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge\ui;

use App\Http\Controllers\SpecialistPatterns\Bridge\platforms\Database;

// Создаем класс UserInterface
class UserInterface
{
    private $db; // Поле для хранения объекта базы данных

    /**
     * Конструктор класса UserInterface.
     *
     * @param Database $db Объект базы данных, который используется в интерфейсе.
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Метод для входа пользователя в систему.
     *
     * @param string $userName Имя пользователя.
     */
    public function login(string $userName)
    {
        // Проверка наличия пользователя в базе данных и вывод информации о входе
        if ($this->db->hasUser($userName)) {
            printf("Пользователь %s вошел в систему как %s<br />", $userName, $this->getRole());
        }
    }

    /**
     * Метод для отрисовки интерфейса пользователя.
     */
    public function drawInterface()
    {
        $this->db->queryData(); // Выполнение запроса данных из базы данных
        echo "Данные для обычного пользователя";
    }

    /**
     * Метод для получения роли пользователя.
     * @return string Роль пользователя, например, "ПростойПользователь".
     */
    public function getRole(): string
    {
        return "ПростойПользователь";
    }
}
