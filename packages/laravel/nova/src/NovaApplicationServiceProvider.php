<?php

namespace Laravel\Nova;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Exceptions\NovaExceptionHandler;
/**
 * Класс NovaApplicationServiceProvider
 *
 * Этот класс представляет собой поставщика сервисов Laravel Nova для настройки и инициализации различных компонентов.
 */
class NovaApplicationServiceProvider extends ServiceProvider
{
    /**
     * Инициализация сервиса.
     *
     * @return void
     */
    public function boot()
    {
        // Настройка политик доступа (gate).
        $this->gate();

        // Настройка маршрутов Nova.
        $this->routes();

        // Обработка события ServingNova.
        Nova::serving(function (ServingNova $event) {
            // Настройка авторизации Nova.
            $this->authorization();

            // Регистрация обработчика исключений Nova.
            $this->registerExceptionHandler();

            // Регистрация ресурсов Nova.
            $this->resources();

            // Регистрация панелей управления Nova.
            Nova::dashboards($this->dashboards());

            // Регистрация инструментов Nova.
            Nova::tools($this->tools());
        });
    }

    /**
     * Настройка маршрутов Nova.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes();
    }

    /**
     * Настройка авторизации Nova.
     *
     * @return void
     */
    protected function authorization()
    {
        Nova::auth(function ($request) {
            return app()->environment('local') ||
                Gate::check('viewNova', [Nova::user($request)]);
        });
    }

    /**
     * Настройка политик доступа (gate).
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                // Список адресов электронной почты с доступом к Nova.
            ]);
        });
    }

    /**
     * Возвращает массив панелей управления Nova.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Возвращает массив инструментов Nova.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Регистрация обработчика исключений Nova.
     *
     * @return void
     */
    protected function registerExceptionHandler()
    {
        app()->bind(ExceptionHandler::class, NovaExceptionHandler::class);
    }

    /**
     * Регистрация ресурсов Nova.
     *
     * @return void
     */
    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova'));
    }

    /**
     * Регистрация сервиса.
     *
     * @return void
     */
    public function register()
    {
        // Метод оставлен пустым, поскольку регистрация сервисов не требуется в данном случае.
    }
}
