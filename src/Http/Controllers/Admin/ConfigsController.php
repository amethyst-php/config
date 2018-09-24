<?php

namespace Railken\Amethyst\Http\Controllers\Admin;

use Railken\Amethyst\Api\Http\Controllers\RestConfigurableController;
use Railken\Amethyst\Api\Http\Controllers\Traits as RestTraits;

class ConfigsController extends RestConfigurableController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    /**
     * The config path.
     *
     * @var string
     */
    public $config = 'amethyst.config';

    /**
     * The attributes that are queryable.
     *
     * @var array
     */
    public $queryable = [
        'id',
        'key',
        'value',
        'visibility',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are fillable.
     *
     * @var array
     */
    public $fillable = [
        'key',
        'value',
        'visibility',
    ];
}
