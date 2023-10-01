<?php

namespace App\Providers;

use App\Http\Controllers\SOLID\O\example2\KostromaContactInfoStrategy;
use App\Http\Controllers\SOLID\O\example2\MoscowContactInfoStrategy;
use Illuminate\Support\ServiceProvider;
use App\Contracts\ContactInfoStrategy;

class ContactInfoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactInfoStrategy::class, function ($app) {
            // Получите координаты пользователя (например, из запроса или настроек)
//            $latitude = 55.7558; // Широта Москвы (пример)
//            $longitude = 37.6176; // Долгота Москвы (пример)

            // Получите город на основе координат с использованием GeoLocationService
//            $geoLocationService = $app->make(GeoLocationService::class);
//            $city = $geoLocationService->getCityByCoordinates($latitude, $longitude);

            $city = 'Kostroma';

            // В зависимости от города, верните соответствующую реализацию
            if ($city === 'Moscow') {
                return new MoscowContactInfoStrategy();
            } elseif ($city === 'Kostroma') {
                return new KostromaContactInfoStrategy();
            } else {
                // Вернуть реализацию по умолчанию или обработать другие случаи
                return new MoscowContactInfoStrategy();
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
