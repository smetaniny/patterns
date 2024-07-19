<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge\platforms;

use Illuminate\Database\Query\Builder;

// Создаем класс MySQLDB, реализующий интерфейс Database
class MySQLDB implements Database
{
    /**
     * Метод для проверки наличия пользователя в базе данных MySQL.
     *
     * @param string $userName Имя пользователя, которое нужно проверить.
     *
     * @return bool `true`, если пользователь с указанным именем существует, иначе `false`.
     */
    public function hasUser(string $userName): bool
    {
        // Выполняем запрос к базе данных MySQL для проверки пользователя
        echo "'SELECT' * 'FROM' 'Users' 'WHERE' 'UserName'='$userName'";

        return false;
    }

    /**
     * Метод для выполнения запроса данных из базы данных MySQL.
     */
    public function queryData()
    {
        // Выполняем SQL-запрос для получения данных из таблицы DataTable
        echo "'SELECT' * 'FROM' 'DataTable' 'LIMIT' '10'";
    }
}
