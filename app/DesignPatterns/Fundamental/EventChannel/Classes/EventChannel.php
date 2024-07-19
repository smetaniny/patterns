<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterfaces;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterfaces;

/**
 * Класс канала событий.
 */
class EventChannel implements EventChannelInterfaces
{
    //Массив тем на которые можно подписываться
    private array $topics = [];


    /**
     * Реализация метода подписка
     *
     * @param $topic
     * @param SubscriberInterfaces $subscriber
     *
     * @return mixed|void
     */
    public function subscribe($topic, SubscriberInterfaces $subscriber)
    {
        //В массив наших тем с ключом $topic добавляем $subscriber
        $this->topics[$topic][] = $subscriber;

        //Выводим сообщение
        $msg = "{$subscriber->getName()} подписан(-а) на [{$topic}]";
//        debug($msg);
    }


    /**
     * Метод будут дергать поставщики, когда произойдет событие (появится новая новость)
     *
     * @param string $topic - тема события
     * @param string $data - какие-то данный
     *
     * @return mixed|void
     */
    public function publish($topic, $data)
    {
        // Если такого топика по такой теме нет, просто выходим
        if (empty($this->topics[$topic])) {
            return;
        }

        //Берем всех подписчиков
        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->notify($data);
        }
    }
}






























