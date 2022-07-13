<?php

namespace App\DesignPatterns\Fundamental\Delegation\Interfaces;

/**
 *  interface MessengerInterface
 */
interface MessengerInterface
{

    /**
     * Устанавливаем того кто отправляет сообщения
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setSender($value) : MessengerInterface;


    /**
     * Устанавливаем того кто получает сообщения
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setRecipient($value) : MessengerInterface;


    /**
     * Устанавливаем само сообщение
     *
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setMessage($value) : MessengerInterface;


    /**
     * Отправить сообщение
     *
     * @return Bool
     */
    public function send() : Bool;
}
