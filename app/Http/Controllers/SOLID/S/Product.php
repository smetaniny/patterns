<?php
namespace App\Http\Controllers\SOLID\S;


/**
 * У класса одна обязанность работа с БД продукта
 */
class Product
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function setPrice($price)
    {
        try {
            //Пытаемся записать цену в БД
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
        }
    }
}
