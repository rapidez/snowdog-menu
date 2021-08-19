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
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez/snowdog-menu'),
        ], 'views');

        $this->mergeConfigFrom(__DIR__.'/../config/snowdogmenu.php', 'snowdogmenu');

        $this->publishes([
            __DIR__.'/../config/snowdogmenu.php' => config_path('snowdogmenu.php'),
        ], 'config');

        Blade::component('snowdog-menu', SnowdogMenuComponent::class);
    }
}
