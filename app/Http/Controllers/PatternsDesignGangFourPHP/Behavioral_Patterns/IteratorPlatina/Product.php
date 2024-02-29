<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\IteratorPlatina;

/**
 * Класс, представляющий продукт
 */
class Product {
    // Приватные свойства для хранения идентификатора, имени и цены продукта
    private $id;
    private $name;
    public $price;

    /**
     * Конструктор класса
     *
     * @param $id Идентификатор продукта
     * @param $name Название продукта
     * @param $price Цена продукта
     */
    public function __construct($id, $name, $price) {
        // Присвоение переданных значений свойствам объекта
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Метод для получения идентификатора продукта
     *
     * @return mixed Идентификатор продукта
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Метод для получения названия продукта
     *
     * @return mixed Название продукта
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Метод для получения цены продукта
     *
     * @return mixed Цена продукта
     */
    public function getPrice() {
        return $this->price;
    }
}
