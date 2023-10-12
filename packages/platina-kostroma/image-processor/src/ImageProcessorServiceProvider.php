<?php

namespace PlatinaKostroma\ImageProcessor;

use Illuminate\Support\ServiceProvider;
use PlatinaKostroma\ImageProcessor\Contracts\ImageProcessorInterface;
use PlatinaKostroma\ImageProcessor\Services\ImageProcessor;

class ImageProcessorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'platina-kostroma');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'platina-kostroma');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/image-processor.php', 'image-processor');

        // Register the binding for the ImageProcessorInterface
        $this->app->bind(ImageProcessorInterface::class, ImageProcessor::class);


        // Register the service the package provides.
        $this->app->singleton('image-processor', function ($app) {
            return new \PlatinaKostroma\ImageProcessor\ImageProcessor();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['image-processor'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/image-processor.php' => config_path('image-processor.php'),
        ], 'image-processor.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/platina-kostroma'),
        ], 'image-processor.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/platina-kostroma'),
        ], 'image-processor.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/platina-kostroma'),
        ], 'image-processor.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
