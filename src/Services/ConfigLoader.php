<?php

namespace Amethyst\Services;

use Amethyst\Contracts\ConfigLoaderContract;
use Illuminate\Container\Container;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class ConfigLoader implements ConfigLoaderContract
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * Create a new instance of the service.
     *
     * @param Container $application
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Boot the service.
     */
    public function boot()
    {
        if (Schema::hasTable(Config::get('amethyst.config.data.config.table'))) {
            $config = $this->app->get('amethyst')->get('config')->getRepository()->newQuery()->whereNotNull('value')->get();

            $this->setMany($this->mapConfigToArray($config));
        }
    }

    /**
     * Load the configuration.
     *
     * @param Collection $config
     *
     * @return array
     */
    public function mapConfigToArray(Collection $config): array
    {
        return $config->mapWithKeys(function ($config) {
            return [$config->key => $config->value];
        })->toArray();
    }

    /**
     * Load an array.
     *
     * @param array $config
     */
    public function setMany(array $config)
    {
        $this->app->get('config')->set($config);
    }

    /**
     * Load by key and value.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->app->get('config')->offsetSet($key, $value);
    }

    /**
     * UnLoad by key.
     *
     * @param $key
     * @param $value
     */
    public function unset($key)
    {
        unset($this->app->get('config')[$key]);
    }
}
