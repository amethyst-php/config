<?php

namespace Amethyst\Managers;

use Amethyst\Common\ConfigurableManager;
use Amethyst\Models\Config;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Repositories\ConfigRepository getRepository()
 */
/**
 * @method \Amethyst\Models\Config newEntity()
 * @method \Amethyst\Schemas\ConfigSchema getSchema()
 * @method \Amethyst\Repositories\ConfigRepository getRepository()
 * @method \Amethyst\Serializers\ConfigSerializer getSerializer()
 * @method \Amethyst\Validators\ConfigValidator getValidator()
 * @method \Amethyst\Authorizers\ConfigAuthorizer getAuthorizer()
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
