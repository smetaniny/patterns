<?php

namespace App\Http\Controllers\SpecialistPatterns\Bridge\platforms;


// Создаем интерфейс Database для базы данных
interface Database {
    /**
     * Метод для проверки наличия пользователя в базе данных.
     *
     * @param string $userName Имя пользователя, которое нужно проверить.
     *
     * @return bool `true`, если пользователь с указанным именем существует, иначе `false`.
     */
    public function hasUser(string $userName): bool;

    /**
     * Метод для выполнения запроса данных из базы данных.
     */
    public function queryData();
}
