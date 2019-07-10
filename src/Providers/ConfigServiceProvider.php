<?php

namespace Amethyst\Providers;

use Amethyst\Common\CommonServiceProvider;
use Amethyst\Managers\ConfigManager;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class ConfigServiceProvider extends CommonServiceProvider
{
    /**
     * @var string
     */
    protected $config = 'amethyst.config';

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();

        if (Schema::hasTable(Config::get('amethyst.config.data.config.table'))) {
            $manager = new ConfigManager();
            $manager->loadConfig();
        }
    }
}
