<?php

namespace Railken\LaraOre\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config as ConfigFacade;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Config extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = \Illuminate\Support\Facades\Config::get('ore.config.table');
    }

    public function resolveKey($key)
    {
        $configs = ConfigFacade::get('ore.config.editable');

        return isset($configs[$key]) ? $configs[$key] : 'void';
    }
}
