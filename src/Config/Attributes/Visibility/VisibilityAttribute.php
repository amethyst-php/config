<?php

namespace Railken\LaraOre\Config\Attributes\Visibility;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class VisibilityAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'visibility';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

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
    public $comment = "Indicate if the config should be private or public";

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\ConfigVisibilityNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ConfigVisibilityNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ConfigVisibilityNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\ConfigVisibilityNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'config.attributes.visibility.fill',
        Tokens::PERMISSION_SHOW => 'config.attributes.visibility.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param \Railken\Laravel\Manager\Contracts\EntityContract $entity
     * @param mixed                                             $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return in_array($value, ['private', 'public']);
    }
}
