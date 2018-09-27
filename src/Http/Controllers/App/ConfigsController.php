<?php

namespace Railken\Amethyst\Http\Controllers\App;

use Railken\Amethyst\Api\Http\Controllers\RestManagerController;
use Railken\Amethyst\Api\Http\Controllers\Traits as RestTraits;
use Railken\Amethyst\Managers\ConfigManager;

class ConfigsController extends RestManagerController
{
    use RestTraits\RestIndexTrait;

    /**
     * The class of the manager.
     *
     * @var string
     */
    public $class = ConfigManager::class;

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
