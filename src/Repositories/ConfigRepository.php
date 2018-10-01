<?php

namespace Railken\Amethyst\Repositories;

use Railken\Lem\Repository;

class ConfigRepository extends Repository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function findToLoad()
    {
        return $this->newQuery()->whereNotNull('value')->get();
    }
}