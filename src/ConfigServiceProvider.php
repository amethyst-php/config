<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        if (!class_exists('CreateConfigsTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_configs_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_configs_table.php'),
            ], 'migrations');
        }

        if (Schema::hasTable('configs')) {
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
