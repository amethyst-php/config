<?php

namespace Railken\Amethyst\Managers;

use Illuminate\Support\Facades\Config as ConfigFacade;
use Railken\Amethyst\Models\Config;
use Railken\Lem\Manager;

/**
 * @method \Railken\Amethyst\Repositories\ConfigRepository getRepository()
 */
class ConfigManager extends Manager
{
    /**
     * Describe this manager.
     *
     * @var string
     */
    public $comment = '...';

    /**
     * Register Classes.
     */
    public function registerClasses()
    {
        return ConfigFacade::get('amethyst.config.managers.config');
    }

    /**
     * Load configs.
     */
    public function loadConfig()
    {
        $configs = $this->getRepository()->findToLoad();

        $configs = $configs->mapWithKeys(function (Config $config, $key) {
            return [$config->key => $config->value];
        })->toArray();

        config($configs);
    }
}
