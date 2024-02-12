<?php

namespace Laravel\Nova\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;

/**
 * Класс ServingNova
 *
 * Этот класс представляет объект события, которое используется для уведомления о событии
 * обслуживания запроса в Laravel Nova.
 */
class ServingNova
{
    use Dispatchable;

    /**
     * Объект запроса.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * Создание нового экземпляра события ServingNova.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}

