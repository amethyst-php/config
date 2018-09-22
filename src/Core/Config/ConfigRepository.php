<?php

namespace Railken\LaraOre\Core\Config;

use Railken\Laravel\Manager\ModelRepository;

class ConfigRepository extends ModelRepository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function findToLoad()
    {
        return $this->newQuery()->whereNotNull('value')->get();
    }
}
