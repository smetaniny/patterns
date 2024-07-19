<?php
namespace App\Http\Controllers\SOLID\O;

/**
 * У класса одна обязанность работа с БД продукта
 */
class Product
{
    private LoggerInterface $loggerInterface;

    public function __construct(LoggerInterface $loggerInterface)
    {
        $this->loggerInterface = $loggerInterface;
    }

    public function setPrice($price)
    {
        try {
            //Пытаемся записать цену в БД
        } catch (Exception $e) {
            $this->loggerInterface->log($e->getMessage());
        }
    }
}
