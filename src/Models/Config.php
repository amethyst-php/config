<?php

namespace Railken\Amethyst\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config as ConfigFacade;
use Railken\Amethyst\Schemas\ConfigSchema;
use Railken\Lem\Contracts\EntityContract;

/**
 * @property string $key
 * @property string $value
 * @property string $visibility
 */
class Config extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = ConfigFacade::get('amethyst.config.managers.config.table');
        $this->fillable = collect((new ConfigSchema())->getAttributes())->filter(function ($attribute) {
            return $attribute->getFillable();
        })->map(function ($attribute) {
            return $attribute->getName();
        })->toArray();
    }
}