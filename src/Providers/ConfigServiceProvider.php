<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Railken\Amethyst\Api\Support\Router;
use Railken\Amethyst\Managers\ConfigManager;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/amethyst.config.php' => config_path('amethyst.config.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadRoutes();

        if (Schema::hasTable(Config::get('amethyst.config.table'))) {
            $manager = new ConfigManager();
            $manager->loadConfig();
        }
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Amethyst\ApiServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../../config/amethyst.config.php', 'amethyst.config');
    }

    /**
     * Load routes.
     */
    public function loadRoutes()
    {
        $config = Config::get('amethyst.config.http.admin');

        Router::group('admin', Arr::get($config, 'router'), function ($router) use ($config) {
            $controller = Arr::get($config, 'controller');

            $router->get('/', ['as' => 'index', 'uses' => $controller.'@index']);
            $router->post('/', ['as' => 'create', 'uses' => $controller.'@create']);
            $router->put('/{id}', ['as' => 'update', 'uses' => $controller.'@update']);
            $router->delete('/{id}', ['as' => 'remove', 'uses' => $controller.'@remove']);
            $router->get('/{id}', ['as' => 'show', 'uses' => $controller.'@show']);
        });

        $config = Config::get('amethyst.config.http.app');

        Router::group('app', Arr::get($config, 'router'), function ($router) use ($config) {
            $controller = Arr::get($config, 'controller');

            $router->get('/', ['uses' => $controller.'@index']);
            $router->get('/{id}', ['uses' => $controller.'@show']);
        });
    }
}
