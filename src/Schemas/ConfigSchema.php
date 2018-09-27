<?php

namespace Railken\Amethyst\Schemas;

use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class ConfigSchema extends Schema
{
    /**
     * Get all attributes.
     *
     * @return array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('key')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\TextAttribute::make('value'),
            Attributes\EnumAttribute::make('visibility', ['private', 'public'])
                ->setRequired(true),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
        ];
    }
}
