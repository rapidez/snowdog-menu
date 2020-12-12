<?php

namespace Rapidez\SnowdogMenu;

use Rapidez\SnowdogMenu\ViewComponents\SnowdogMenuComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SnowdogMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'snowdogmenu');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/snowdogmenu'),
        ], 'views');

        $this->mergeConfigFrom(__DIR__.'/config/snowdogmenu.php', 'snowdogmenu');

        $this->publishes([
            __DIR__.'/config/snowdogmenu.php' => config_path('snowdogmenu.php'),
        ], 'config');

        Blade::component('snowdog-menu', SnowdogMenuComponent::class);
    }
}
