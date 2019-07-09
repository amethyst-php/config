<?php

namespace Amethyst\Http\Controllers\App;

use Amethyst\Api\Http\Controllers\RestManagerController;
use Amethyst\Api\Http\Controllers\Traits as RestTraits;
use Amethyst\Managers\ConfigManager;

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
