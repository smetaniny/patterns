<?php
namespace App\Http\Controllers\SOLID\S;

/**
 * У класса одна обязанность логировать сообщения
 */
class Logger
{
    /**
     * Пишем в файл
     *
     * @param $message
     */
    public function log($message)
    {
        $this->saveToFile($message);
    }


    private function saveToFile($message) {
        //...
    }
}
