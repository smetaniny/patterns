<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterfaces;

class Subscriber implements SubscriberInterfaces
{
    private string $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * Уведомления
     *
     * @param $data
     *
     * @return mixed|void
     */
    public function notify($data)
    {
        $msg = "{$this->getName()} оповещен(а) данными [{$data}]";
        debug($msg);
    }


    public function getName()
    {
        return $this->name;
    }
}
