<?php

namespace App\Providers;

use App\Http\Controllers\SOLID\D\Example2\OnlineOrderService;
use App\Http\Controllers\SOLID\D\Example2\PhoneOrderService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderService;

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
