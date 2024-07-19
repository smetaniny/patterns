<?php
namespace App\Http\Controllers\SOLID\O;


/**
 * Класс записи в файл
 */
class FileLogger implements LoggerInterface
{
    private function saveToFile($message) {
        //...
    }

    public function log($message)
    {
        $this->saveToFile($message);
    }

}


/**
 * Класс записи в БД
 */
class BDLogger implements LoggerInterface
{
    private function saveToDB($message) {
        //...
    }

    public function log($message)
    {
        $this->saveToDB($message);
    }
}
