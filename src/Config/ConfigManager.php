<?php

namespace Railken\LaraOre\Config;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Config;

class ConfigManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity;

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Key\KeyAttribute::class,
        Attributes\Value\ValueAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\ConfigNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->entity = Config::get('ore.config.entity');
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.config.attributes')));
        
        $classRepository = Config::get('ore.config.repository');
        $this->setRepository(new $classRepository($this));

        $classSerializer = Config::get('ore.config.serializer');
        $this->setSerializer(new $classSerializer($this));

        $classAuthorizer = Config::get('ore.config.authorizer');
        $this->setAuthorizer(new $classAuthorizer($this));

        $classValidator = Config::get('ore.config.validator');
        $this->setValidator(new $classValidator($this));

        parent::__construct($agent);
    }
    /**
     * Load configs.
     *
     * @return void
     */
    public function loadConfig()
    {
        $configs = $this->getRepository()->findToLoad();

        $configs = $configs->mapWithKeys(function ($config, $key) {
            return [$config->resolveKey($config->key) => $config->value];
        })->toArray();

        config($configs);
    }
}
