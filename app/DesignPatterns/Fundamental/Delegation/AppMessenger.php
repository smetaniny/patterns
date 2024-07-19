<?php

namespace App\DesignPatterns\Fundamental\Delegation;

use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;


/**
 * Демонстрация шаблона проектирования - Делегирование
 */
class AppMessenger implements MessengerInterface
{

    /**
     * Экземпляр класса работника на которого делегируем работу
     * @var MessengerInterface
     */
    private MessengerInterface $messenger;


    public function __construct()
    {
        //Отправка по умолчанию по email
        $this->toEmail();
    }


    /**
     * Отправка по Email
     *
     * @return $this
     */
    public function toEmail(): static
    {
        $this->messenger = new EmailMessenger();

        return $this;
    }


    /**
     * Отправка по Email
     *
     * @return $this
     */
    public function toSms(): static
    {
        $this->messenger = new SmsMessenger();

        return $this;
    }


    /**
     * Устанавливаем того кто отправляет сообщения
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setSender($value): MessengerInterface
    {
       $this->messenger->setSender($value);

       return $this->messenger;
    }


    /**
     * Устанавливаем того кто получает сообщения
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setRecipient($value): MessengerInterface
    {
        $this->messenger->setRecipient($value);

        return $this->messenger;
    }


    /**
     * Устанавливаем само сообщение
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setMessage($value): MessengerInterface
    {
        $this->messenger->setMessage($value);

        return $this->messenger;
    }



    public function send(): bool
    {
        return  $this->messenger->send();
    }
}
