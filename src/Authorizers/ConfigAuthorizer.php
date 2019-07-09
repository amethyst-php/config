<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class ConfigAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'config.create',
        Tokens::PERMISSION_UPDATE => 'config.update',
        Tokens::PERMISSION_SHOW   => 'config.show',
        Tokens::PERMISSION_REMOVE => 'config.remove',
    ];
}
