<?php

namespace Amethyst\Providers;

use Amethyst\Contracts\ConfigLoaderContract;
use Amethyst\Core\Providers\CommonServiceProvider;
use Amethyst\Models\Config;
use Amethyst\Observers\ConfigObserver;
use Amethyst\Services\ConfigLoader;

class ConfigServiceProvider extends CommonServiceProvider
{
    /**
     * @inherit
     */
    public function register()
    {
        parent::register();

        $this->app->bind(ConfigLoaderContract::class, ConfigLoader::class);
    }

    /**
     * @inherit
     */
    public function boot()
    {
        parent::boot();

        $this->app->make(ConfigLoaderContract::class)->boot();

        Config::observe(ConfigObserver::class);
    }
}
