<?php

namespace Amethyst\Managers;

use Amethyst\Common\ConfigurableManager;
use Amethyst\Models\Config;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Repositories\ConfigRepository getRepository()
 */
class ConfigManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.config.data.config';

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
