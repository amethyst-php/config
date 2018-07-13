<?php

namespace Railken\LaraOre\Config;

use Faker\Factory;
use Railken\Bag;
use Railken\Laravel\Manager\BaseFaker;

class ConfigFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = ConfigManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('key', 'mail.host');
        $bag->set('value', $faker->password);

        return $bag;
    }
}
