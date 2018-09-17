<?php

namespace Railken\LaraOre\Config\Attributes\Key;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class KeyAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'key';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = true;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = true;

    /**
     * Is the attribute fillable.
     *
     * @var bool
     */
    protected $fillable = true;

    /**
     * Describe this attribute.
     *
     * @var string
     */
    public $comment = "Used as an index to compose the config";

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\ConfigKeyNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ConfigKeyNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ConfigKeyNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\ConfigKeyNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'config.attributes.key.fill',
        Tokens::PERMISSION_SHOW => 'config.attributes.key.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return v::length(1, 255)->validate($value);
    }
}
