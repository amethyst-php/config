<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\ConfigFaker;
use Railken\Amethyst\Managers\ConfigManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class ConfigTest extends BaseTest
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
