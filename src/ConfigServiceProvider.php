<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
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

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.user.permission.managers' => array_merge(Config::get('ore.user.permission.managers'), [
            \Railken\LaraOre\Config\ConfigManager::class,
        ])]);

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
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.config.php', 'ore.config');
    }
    /**
    * Load routes.
    *
    * @return void
    */
    public function loadRoutes()
    {
        Route::group([
            'namespace' => 'Railken\LaraOre\Http\Controllers',
            'prefix' => '/api/v1',
        ], function ($router) {
            Route::group([
                'prefix' => '/admin/configs',
                'middleware' => Config::get('ore.user.router.middlewares'),
            ], function ($router) {
                $router->get('/', ['uses' => 'ConfigsController@index']);
                $router->post('/', ['uses' => 'ConfigsController@create']);
                $router->put('/{id}', ['uses' => 'ConfigsController@update']);
                $router->delete('/{id}', ['uses' => 'ConfigsController@remove']);
                $router->get('/{id}', ['uses' => 'ConfigsController@show']);
            });
        });
    }
}
