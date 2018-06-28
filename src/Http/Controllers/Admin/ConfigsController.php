<?php

namespace Railken\LaraOre\Http\Controllers\Admin;

use Railken\LaraOre\Api\Http\Controllers\RestConfigurableController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\Config\ConfigManager;

class ConfigsController extends RestConfigurableController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    /**
     * The config path
     *
     * @var string
     */
    public $config = 'ore.config';

    public $queryable = [
        'id',
        'key',
        'value',
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'key',
        'value',
    ];
}
