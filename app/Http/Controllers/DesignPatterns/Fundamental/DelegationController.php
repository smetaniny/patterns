<?php

namespace App\Http\Controllers\DesignPatterns\Fundamental;

use App\Http\Controllers\Controller;
use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use Illuminate\Http\Request;

use DebugBar\DebugBar;

class DelegationController extends Controller
{
    protected AppMessenger $appMessenger;

    public function __construct(AppMessenger $appMessenger)
    {
        $this->appMessenger = $appMessenger;
    }

    function renderOutput(Request $request): \Illuminate\Http\Response
    {
        $name = "Делегирование (DelegationController)";

        $this->appMessenger->setSender("setSender@yandex.ru")
            ->setRecipient("setRecipient@yandex.ru")
            ->setMessage("Hello email messenger!")
            ->send();

        $this->appMessenger->toSms()
            ->setSender("11111111111")
            ->setRecipient("22222222222")
            ->setMessage("Hello sms messenger!")
            ->send();


        return response()->view("welcome");
    }
}
