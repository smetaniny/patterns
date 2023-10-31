<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge;

use App\Http\Controllers\SpecialistPatterns\Bridge\platforms\MicrosoftSQLDB;
use App\Http\Controllers\SpecialistPatterns\Bridge\platforms\MySQLDB;
use App\Http\Controllers\SpecialistPatterns\Bridge\ui\AdminInterface;
use App\Http\Controllers\SpecialistPatterns\Bridge\ui\UserInterface;

class ProgramSpecialistBridge
{
    public function index()
    {
        // Создание объекта базы данных Microsoft SQL и пользовательского интерфейса
        {
            $db = new MicrosoftSQLDB();
            $ui = new UserInterface($db);

            $ui->login("Sergey"); // Вход пользователя
            $ui->drawInterface(); // Отображение пользовательского интерфейса
        }

        // Создание объекта базы данных Microsoft SQL и администраторского интерфейса
        {
            $db = new MicrosoftSQLDB();
            $ui = new AdminInterface($db);

            $ui->login("Sergey"); // Вход администратора
            $ui->drawInterface(); // Отображение администраторского интерфейса
        }

        // Создание объекта базы данных MySQL и пользовательского интерфейса
        {
            $db = new MySQLDB();
            $ui = new UserInterface($db);

            $ui->login("Sergey"); // Вход пользователя
            $ui->drawInterface(); // Отображение пользовательского интерфейса
        }

        // Создание объекта базы данных MySQL и администраторского интерфейса
        {
            $db = new MySQLDB();
            $ui = new AdminInterface($db);

            $ui->login("Sergey"); // Вход администратора
            $ui->drawInterface(); // Отображение администраторского интерфейса
        }

    }
}
