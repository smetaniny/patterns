<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge\platforms;


// Создаем класс MicrosoftSQLDB, реализующий интерфейс Database
class MicrosoftSQLDB implements Database
{
    /**
     * Метод для проверки наличия пользователя в базе данных Microsoft SQL.
     *
     * @param string $userName Имя пользователя, которое нужно проверить.
     *
     * @return bool `true`, если пользователь с указанным именем существует, иначе `false`.
     */
    public function hasUser(string $userName): bool
    {
        printf("SELECT * FROM 'Users' WHERE UserName='%s'<br />", $userName);
        return true; // Здесь можно добавить реальную проверку в базе данных
    }

    /**
     * Метод для выполнения запроса данных из базы данных Microsoft SQL.
     */
    public function queryData()
    {
        echo "SELECT 'TOP' 10 * FROM 'DataTable'"; // Пример SQL-запроса
    }
}
