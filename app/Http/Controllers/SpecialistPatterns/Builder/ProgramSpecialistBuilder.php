<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

class ProgramSpecialistBuilder
{
    public function index()
    {
        /**
         * Создание экземпляров строителей для разных видов конструкций
         */
        // Строитель для подсчёта стоимости
        $priceBuilder = new PriceBuilder();
        // Строитель для строительства дома
        $houseBuilder = new HouseBuilder();
        // Строитель для документации
        $docBuilder = new DocBuilder();

        /**
         * Создание директоров для разных видов строительства
         */
        // Продавец
        $salesman = new Director($priceBuilder);
        // Прораб
        $foreman = new Director($houseBuilder);
        // Менеджер
        $manager = new Director($docBuilder);

        // Директор продаж заказывает строительство и получает стоимость
        $salesman->make(true);
        $price = $priceBuilder->getResult();
        echo "Результат работы продавца - цена $price<br /> <br />";

        // Директор стройки заказывает строительство и получает дом
        $foreman->make(true);
        $house = $houseBuilder->getResult();
        echo "Результат работы прораба - дом:<br />" . $house . "<br /> <br />";

        // Директор управления документацией заказывает документацию и получает документ
        $manager->make(true);
        $doc = $docBuilder->getResult();
        echo "Результат работы менеджера - документ:<br />" . $doc . "<br />";
    }
}
