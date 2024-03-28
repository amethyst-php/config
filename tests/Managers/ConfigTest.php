<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\ConfigFaker;
use Amethyst\Managers\ConfigManager;
use Amethyst\Tests\Base;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class ConfigTest extends Base
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = ConfigManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = ConfigFaker::class;
}
