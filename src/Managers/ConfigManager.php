<?php

namespace Railken\Amethyst\Managers;

use Illuminate\Support\Facades\Config as ConfigFacade;
use Railken\Amethyst\Models\Config;
use Railken\Lem\Attributes;
use Railken\Lem\Manager;

/**
 * @method \Railken\Amethyst\Repositories\ConfigRepository getRepository()
 * @method \Railken\Amethyst\Validators\ConfigValidator    getValidator()
 * @method \Railken\Amethyst\Serializers\ConfigSerializer  getSerializer()
 * @method \Railken\Amethyst\Authorizers\ConfigAuthorizer  getAuthorizer()
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
        return ConfigFacade::get('amethyst.config');
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
