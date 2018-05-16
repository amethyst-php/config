<?php

namespace Railken\LaraOre\Config;

use Railken\Laravel\Manager\ModelRepository;

class ConfigRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Config::class;
}
