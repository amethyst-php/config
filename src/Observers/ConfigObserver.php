<?php

namespace Amethyst\Observers;

use Amethyst\Contracts\ConfigLoaderContract;
use Amethyst\Models\Config;

class ConfigObserver
{
    /**
     * @var ConfigLoaderContract
     */
    protected $configLoader;

    /**
     * Create a new instance.
     *
     * @param ConfigLoaderContract $configLoader
     */
    public function __construct(ConfigLoaderContract $configLoader)
    {
        $this->configLoader = $configLoader;
    }

    /**
     * Handle the Config "updated" event.
     *
     * @param \Amethyst\Models\Config $config
     */
    public function saved(Config $config)
    {
        if (isset($config->getOriginal()['key'])) {
            $oldName = $config->getOriginal()['key'];

            if ($config->name !== $oldName) {
                $this->configLoader->unset($oldName);
            }
        }

        $this->configLoader->set($config->key, $config->value);
    }

    /**
     * Handle the Config "deleted" event.
     *
     * @param \Amethyst\Models\Config $config
     */
    public function deleted(Config $config)
    {
        $this->configLoader->unset($config->key);
    }
}
