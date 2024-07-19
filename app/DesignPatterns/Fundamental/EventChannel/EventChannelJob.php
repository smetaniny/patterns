<?php

namespace App\DesignPatterns\Fundamental\EventChannel;


use App\DesignPatterns\Fundamental\EventChannel\Classes\EventChannel;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Publisher;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Subscriber;


/**
 * Канал событий
 */
class EventChannelJob
{

    public function  run() {
        //Новостной канал событий
        $newChannel = new EventChannel();

        /**
         * Есть три группы поставщики новостей
         */
        $highgardenGroup = new Publisher('highgarden-news', $newChannel);
        $winterfellGroup = new Publisher('winterfell-news', $newChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newChannel);


        /**
         * Есть четыре подписчика
         */
        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lannister');
        $snow = new Subscriber('Jon Snow');


        /**
         * Подписчики подписываются на определенные группы
         */
        $newChannel->subscribe('highgarden-news', $cersei);
        $newChannel->subscribe('winterfell-news', $sansa);

        $newChannel->subscribe('highgarden-news', $arya);
        $newChannel->subscribe('winterfell-news', $arya);

        $newChannel->subscribe('winterfell-news', $snow);


        /**
         * Публикация новостей в группах
         */
        $highgardenGroup->publish('New highgarden post');
        $winterfellGroup->publish('New winterfell post');
        $winterfellDaily->publish('New alternative winterfell post');
    }

    public static function getDescription()
    {
    }
}
