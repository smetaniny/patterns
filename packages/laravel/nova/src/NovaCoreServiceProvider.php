<?php

namespace Laravel\Nova;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Logout;
use Illuminate\Container\Container;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Auth\Adapters\SessionImpersonator;
use Laravel\Nova\Contracts\ImpersonatesUsers;
use Laravel\Nova\Contracts\QueryBuilder;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\ServeNova;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Listeners\BootNova;
use Laravel\Nova\Query\Builder;
use Laravel\Octane\Events\RequestReceived;
use Spatie\Once\Cache;

/**
 * The primary purpose of this service provider is to push the ServeNova
 * middleware onto the middleware stack so we only need to register a
 * minimum number of resources for all other incoming app requests.
 */
class NovaCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Вызываем событие boot для Nova и передаем класс BootNova для обработки
//        Nova::booted(BootNova::class);

        // Если приложение запущено в консольном режиме
//        if ($this->app->runningInConsole()) {
//            // Регистрируем сервис-провайдер NovaServiceProvider
//            $this->app->register(NovaServiceProvider::class);
//        }

        // Если конфигурация не кэширована, сливаем конфигурацию Nova из файла nova.php
//        if (! $this->app->configurationIsCached()) {
//            $this->mergeConfigFrom(__DIR__.'/../config/nova.php', 'nova');
//        }

//        // Регистрируем middleware для группы маршрутов 'nova' и 'nova:api' с указанными middleware'ами
        Route::middlewareGroup('nova', config('nova.middleware', []));
        Route::middlewareGroup('nova:api', config('nova.api_middleware', []));

        // Регистрируем middleware ServeNova для обработки запросов к Nova
//        $this->app->make(HttpKernel::class)
//            ->pushMiddleware(ServeNova::class);

        // После успешного разрешения NovaRequest (после обработки запроса)
//        $this->app->afterResolving(NovaRequest::class, function ($request, $app) {
//            // Если NovaRequest не зарегистрирован в контейнере, регистрируем его
//            if (! $app->bound(NovaRequest::class)) {
//                $app->instance(NovaRequest::class, $request);
//            }
//        });

        // Регистрируем события Nova, подключаемые в методе registerEvents()
//        $this->registerEvents();

        // Регистрируем ресурсы Nova, подключаемые в методе registerResources()
        $this->registerResources();

        // Регистрируем JSON-переменные Nova, подключаемые в методе registerJsonVariables()
        $this->registerJsonVariables();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Если константа NOVA_PATH не определена, определяем ее
        if (!defined('NOVA_PATH')) {
            define('NOVA_PATH', realpath(__DIR__ . '/../'));
        }

        // Регистрируем синглтон-экземпляр SessionImpersonator для интерфейса ImpersonatesUsers
        $this->app->singleton(ImpersonatesUsers::class, SessionImpersonator::class);

        // Регистрируем привязку Builder к интерфейсу QueryBuilder
        $this->app->bind(QueryBuilder::class, function ($app, $parameters) {
            return new Builder(...$parameters);
        });
    }

    /**
     * Register the package events.
     *
     * @return void
     */
    protected function registerEvents()
    {
        // Определяем события Nova, слушатели которых зарегистрированы в данном методе
        tap($this->app['events'], function ($event) {
            // Обработчик для события Attempting (попытка аутентификации)
            $event->listen(Attempting::class, function () {
                app(ImpersonatesUsers::class)->flushImpersonationData(request());
            });

            // Обработчик для события Logout (выход из системы)
            $event->listen(Logout::class, function () {
                app(ImpersonatesUsers::class)->flushImpersonationData(request());
            });

            // Обработчик для события RequestReceived (получение запроса)
            $event->listen(RequestReceived::class, function ($event) {
                // Сбрасываем состояние Nova и очищаем кэш
                Nova::flushState();
                Cache::getInstance()->flush();

                // Забываем экземпляр ImpersonatesUsers
                $event->sandbox->forgetInstance(ImpersonatesUsers::class);
            });

            // Обработчик для события RequestHandled (обработка запроса завершена)
            $event->listen(RequestHandled::class, function ($event) {
                Container::getInstance()->forgetInstance(NovaRequest::class);
            });
        });
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Регистрируем пути к представлениям и переводам Nova
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova');
//        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova');
//
//        // Если Nova запускает миграции, регистрируем их
//        if (Nova::runsMigrations()) {
//            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//        }

        // Регистрируем маршруты Nova, подключаемые в методе registerRoutes()
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        // Группируем маршруты Nova с указанными настройками
        Route::group($this->routeConfiguration(), function () {
            // Подключаем маршруты API Nova из файла api.php
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        });
    }

    /**
     * Get the Nova route group configuration array.
     *
     * @return array{domain: string|null, as: string, prefix: string, middleware: string}
     */
    protected function routeConfiguration()
    {
        // Возвращаем конфигурацию маршрутов Nova
        return [
            'domain' => config('nova.domain', null),
            'as' => 'nova.api.',
            'prefix' => 'nova-api',
            'middleware' => 'nova:api',
        ];
    }

    /**
     * Register the Nova JSON variables.
     *
     * @return void
     */
    protected function registerJsonVariables()
    {
        // Обработчик события Nova::serving, который предоставляет переменные в JavaScript
        Nova::serving(function (ServingNova $event) {
            // Загружаем стандартные переводы Nova
            Nova::translations(lang_path('vendor/nova/' . app()->getLocale() . '.json'));

            // Предоставляем переменные в JavaScript
            Nova::provideToScript([
                'appName' => Nova::name() ?? config('app.name', 'Laravel Nova'),
                'timezone' => config('app.timezone', 'UTC'),
                'translations' => function () {
                    return Nova::allTranslations();
                },
                'userTimezone' => function ($request) {
                    return Nova::resolveUserTimezone($request);
                },
                'pagination' => config('nova.pagination', 'links'),
                'locale' => config('app.locale', 'en'),
                'algoliaAppId' => config('services.algolia.appId'),
                'algoliaApiKey' => config('services.algolia.apiKey'),
                'version' => Nova::version(),
            ]);
        });
    }
}
