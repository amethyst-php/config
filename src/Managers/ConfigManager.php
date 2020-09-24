<?php

namespace Amethyst\Managers;

use Amethyst\Core\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Repositories\ConfigRepository getRepository()
 */
/**
 * @method \Amethyst\Models\Config                 newEntity()
 * @method \Amethyst\Schemas\ConfigSchema          getSchema()
 * @method \Amethyst\Repositories\ConfigRepository getRepository()
 * @method \Amethyst\Serializers\ConfigSerializer  getSerializer()
 * @method \Amethyst\Validators\ConfigValidator    getValidator()
 * @method \Amethyst\Authorizers\ConfigAuthorizer  getAuthorizer()
 */
class ConfigManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.config.data.config';
}
