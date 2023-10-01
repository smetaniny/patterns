<?php

namespace App\Providers;

use App\Contracts\OrderService;
use App\Services\PhoneOrderService;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderService::class, function ($app) {
            return new PhoneOrderService();
//            return new OnlineOrderService();
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
