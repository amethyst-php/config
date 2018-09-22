<?php

namespace Railken\LaraOre\Core\Config;

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
        $bag->set('visibility', 'public');

        return $bag;
    }
}
