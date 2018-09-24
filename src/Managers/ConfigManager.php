<?php

namespace Railken\Amethyst\Managers;

use Illuminate\Support\Facades\Config;
use Railken\Lem\Attributes;
use Railken\Lem\Manager;

/**
 * @method \Railken\Amethyst\Repository getRepository()
 * @method \Railken\Amethyst\Validator  getValidator()
 * @method \Railken\Amethyst\Serializer getSerializer()
 * @method \Railken\Amethyst\Authorizer getAuthorizer()
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
        return Config::get('amethyst.config');
    }

    /**
     * Load configs.
     */
    public function loadConfig()
    {
        $configs = $this->getRepository()->findToLoad();

        $configs = $configs->mapWithKeys(function ($config, $key) {
            return [$config->resolveKey($config->key) => $config->value];
        })->toArray();

        config($configs);
    }

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected function createAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('key')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\TextAttribute::make('value'),
            Attributes\EnumAttribute::make('visibility', ['private', 'public'])
                ->setRequired(true),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
        ];
    }
}
