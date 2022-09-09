<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

interface PublisherInterfaces
{
    /**
     * Уведомление подписчиков
     *
     * @param string $data - Данные которыми уведомятся подписчики
     *
     * @return mixed
     */
    public function publish(string $data);
}
