<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterfaces;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\PublisherInterfaces;

/**
 * Класс создания поставщика новостей
 */
class Publisher implements PublisherInterfaces
{
    private string $topic;

    private EventChannelInterfaces $eventChannel;


    /**
     * @param $topic - тема
     * @param EventChannelInterfaces $eventChannel - канал событий по которому будешь уведомлять
     */
    public function __construct($topic, EventChannelInterfaces $eventChannel)
    {
        $this->topic = $topic;

        $this->eventChannel = $eventChannel;
    }


    /**
     * По такому то топику, отправляем такие то данные
     *
     * @param string $data
     *
     * @return mixed|void
     */
    public function publish(string $data)
    {
        //Бросаем данные в $this->eventChannel
        $this->eventChannel->publish($this->topic, $data);
    }


}
