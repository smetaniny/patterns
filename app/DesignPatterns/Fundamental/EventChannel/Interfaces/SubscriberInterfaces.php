<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

interface SubscriberInterfaces
{
    /**
     * Уведомление подписчика
     *
     * @param $data
     *
     * @return mixed
     */
    public function notify($data);
}
