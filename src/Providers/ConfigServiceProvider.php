<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Railken\Amethyst\Common\CommonServiceProvider;
use Railken\Amethyst\Managers\ConfigManager;

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
