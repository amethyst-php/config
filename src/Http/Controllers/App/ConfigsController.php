<?php

namespace Amethyst\Http\Controllers\App;

use Amethyst\Core\Http\Controllers\RestManagerController;
use Amethyst\Core\Http\Controllers\Traits as RestTraits;
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
     */
    public function getQuery()
    {
        return $this->getManager()->getRepository()->getQuery()->where('visibility', 'public');
    }
}
