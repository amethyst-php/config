<?php

namespace Railken\LaraOre\Core\Config\Attributes\Visibility\Exceptions;

use Railken\LaraOre\Core\Config\Exceptions\ConfigAttributeException;

class ConfigVisibilityNotAuthorizedException extends ConfigAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'visibility';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_VISIBILITY_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
