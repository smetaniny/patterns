<?php

namespace App\DesignPatterns\Fundamental\Delegation\Messengers;


class EmailMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        debug('Send by ' . __METHOD__);
        return parent::send();
    }
}
