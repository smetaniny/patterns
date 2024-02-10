<?php

namespace Laravel\Nova\Http\Middleware;

use Illuminate\Container\Container;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * Класс DispatchServingNovaEvent
 *
 * Этот класс представляет собой посредника (middleware), который отправляет событие ServingNova
 * при обработке запроса перед его передачей следующему слою.
 */
class DispatchServingNovaEvent
{
    /**
     * Обработка запроса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request):mixed  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        // Отправка события ServingNova с объектом запроса.
        ServingNova::dispatch($request);

        // Забывание экземпляра NovaRequest из контейнера.
        Container::getInstance()->forgetInstance(NovaRequest::class);

        // Передача запроса следующему обработчику (следующему посреднику или контроллеру).
        return $next($request);
    }
}
