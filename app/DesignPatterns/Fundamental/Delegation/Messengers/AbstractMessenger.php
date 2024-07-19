<?php
namespace App\DesignPatterns\Fundamental\Delegation\Messengers;

use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;

abstract class AbstractMessenger implements MessengerInterface
{

    /**
     * @var String - отправитель
     */
    protected String $sender;

    /**
     * @var String - получатель
     */
    protected String $recipient;

    /**
     * @var String - сообщение
     */
    protected String $message;


    /**
     * Устанавливаем того кто отправляет сообщения
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setSender($value): MessengerInterface
    {
       $this->sender = $value;

       return $this;
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
        $this->recipient = $value;

        return $this;
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
        $this->message = $value;

        return $this;
    }


    /**
     * Отправка сообщения
     *
     * @return bool
     */
    public function send(): bool
    {
        return true;
    }

}



