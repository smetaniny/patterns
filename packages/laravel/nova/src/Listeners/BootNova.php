<?php

namespace Laravel\Nova\Listeners;

use Laravel\Nova\Nova;
use Laravel\Nova\NovaServiceProvider;
use Laravel\Nova\Tools\Dashboard;
use Laravel\Nova\Tools\ResourceManager;

/**
 *
 */
class BootNova
{
    /**
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        if (! app()->providerIsLoaded(NovaServiceProvider::class)) {
            app()->register(NovaServiceProvider::class);
        }

        $this->registerTools();
        $this->registerResources();
    }

    /**
     *
     * @return void
     */
    protected function registerResources()
    {
        Nova::resources([
            Nova::actionResource(),
        ]);
    }

    /**
     *
     * @return void
     */
    protected function registerTools()
    {
        Nova::tools([
            new Dashboard,
            new ResourceManager,
        ]);
    }
}
