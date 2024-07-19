<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;


/**
 * Интерфейс канала событий.
 * Связующее звено между подписчиком и издателями.
 */
interface EventChannelInterfaces
{
    /**
     * Подписчик $subscriber подписывается на событии (данные, инфу и тп) $topic
     *
     * @param $topic
     * @param SubscriberInterfaces $subscriber
     *
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterfaces $subscriber);


    /**
     * Издатель уведомляет канал о том что надо.
     * Всех кто подписан на тему $topic уведомить данными $data.
     *
     * @param $topic
     * @param $data
     *
     * @return mixed
     */
    public function publish($topic, $data);
}
