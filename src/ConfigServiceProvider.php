<?php

namespace Railken\LaraOre\Config;

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

        if (!class_exists('CreateDisksTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_configs_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_configs_table.php'),
            ], 'migrations');
        }

        if (Schema::hasTable('configs')) {
            $configs = (new \Railken\LaraOre\Config\ConfigManager())->getRepository()->findToLoad();

            $configs = $configs->mapWithKeys(function ($config, $key) {
                return [$config->resolveKey($config->key) => $config->value];
            })->toArray();

            config($configs);
        }
    }

}
