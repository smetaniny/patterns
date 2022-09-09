<?php

namespace App\Http\Controllers\DesignPatterns;

use App\DesignPatterns\Fundamental\EventChannel\EventChannelJob;
use App\Http\Controllers\Controller;

/**
 * Запускаем канал событий
 */
class EventChannel extends Controller
{

    public function eventChannel(): \Illuminate\Http\Response
    {
        $name = "Канал событий (EventChannel)";
        $description = EventChannelJob::getDescription();

        $item = new EventChannelJob();
        $item->run();

        return response()->view("welcome");
    }
}
