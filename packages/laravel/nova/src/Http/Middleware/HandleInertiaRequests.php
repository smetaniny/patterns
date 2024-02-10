<?php

namespace Laravel\Nova\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Laravel\Nova\Http\Resources\UserResource;
use Laravel\Nova\Nova;
/**
 * Класс HandleInertiaRequests
 *
 * Этот класс представляет собой посредника (middleware) для обработки Inertia-запросов в Laravel Nova.
 * Inertia - это стек для создания одностраничных приложений (SPA) на основе Vue.js и Laravel.
 */
class HandleInertiaRequests extends Middleware
{
    /**
     * Путь к корневому шаблону, используемому Inertia.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'nova::layout';

    /**
     * Версионирование ресурсов Inertia.
     *
     * @see https://inertiajs.com/asset-versioning
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        // Составление версии с учетом корневого шаблона.
        return sprintf('%s:%s', $this->rootView, parent::version($request));
    }

    /**
     * Общие переменные для передачи во фронтенд приложения.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        // Объединение переменных из родительского middleware с дополнительными переменными для Inertia.
        return array_merge(parent::share($request), [
            'novaConfig' => function () use ($request) {
                // Получение JSON-переменных от Laravel Nova.
                return Nova::jsonVariables($request);
            },
            'currentUser' => function () use ($request) {
                // Получение текущего пользователя и преобразование его в массив для передачи во фронтенд.
                return with(Nova::user($request), function ($user) use ($request) {
                    return ! is_null($user) ? UserResource::make($user)->toArray($request) : null;
                });
            },
            'validLicense' => function () {
                // Проверка валидности лицензии Laravel Nova.
                return Nova::checkLicenseValidity();
            },
        ]);
    }
}
