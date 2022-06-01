<?php

namespace Rapidez\SnowdogMenu;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Rapidez\SnowdogMenu\ViewComponents\SnowdogMenuComponent;

class SnowdogMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'snowdogmenu');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/snowdogmenu'),
        ], 'views');

        Blade::component('snowdog-menu', SnowdogMenuComponent::class);
    }
}
