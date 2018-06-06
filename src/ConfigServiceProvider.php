<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ore.config.php' => config_path('ore.config.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if (Schema::hasTable(Config::get('ore.config.table'))) {
            $manager = new \Railken\LaraOre\Config\ConfigManager();
            $manager->loadConfig();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.config.php', 'ore.config');
    }
}
