<?php

namespace Railken\Amethyst\Http\Controllers\App;

use Railken\Amethyst\Api\Http\Controllers\RestConfigurableController;
use Railken\Amethyst\Api\Http\Controllers\Traits as RestTraits;

class ConfigsController extends RestConfigurableController
{
    use RestTraits\RestIndexTrait;

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
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->getManager()->getRepository()->getQuery()->where('visibility', 'public');
    }
}
