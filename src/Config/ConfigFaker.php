<?php

namespace Railken\LaraOre\Config;

use Railken\Bag;
use Faker\Factory;

class ConfigFaker
{
    /**
     * @return array
     */
    public static function make()
    {
        $faker = Factory::create();
        
        $bag = new Bag();
        $bag->set('key', "mail_host");
        $bag->set('value', $faker->password);

        return $bag;
    }
}
