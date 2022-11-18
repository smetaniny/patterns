<?php

namespace App\Http\Controllers\DesignPatterns\Fundamental;

use App\DesignPatterns\Fundamental\EventChannel\EventChannelJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Запускаем канал событий
 */
class EventChannelController extends Controller
{

    public function eventChannel(): Response
    {
        $name = "Канал событий (EventChannelController)";
        $description = EventChannelJob::getDescription();

        $item = new EventChannelJob();
        $item->run();

        return response()->view("welcome");
    }
}
