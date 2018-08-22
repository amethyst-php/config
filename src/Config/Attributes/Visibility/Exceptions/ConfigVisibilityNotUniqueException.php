<?php

namespace Railken\LaraOre\Config\Attributes\Visibility\Exceptions;

use Railken\LaraOre\Config\Exceptions\ConfigAttributeException;

class ConfigVisibilityNotUniqueException extends ConfigAttributeException
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
    protected $code = 'CONFIG_VISIBILITY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
