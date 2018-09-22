<?php

namespace Railken\LaraOre\Tests\Http\Admin;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Support\Testing\TestableBaseTrait;
use Railken\LaraOre\Core\Config\ConfigFaker;
use Railken\LaraOre\Tests\BaseTest;

class ConfigTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = ConfigFaker::class;

    /**
     * Router group resource.
     *
     * @var string
     */
    protected $group = 'admin';

    /**
     * Base path config.
     *
     * @var string
     */
    protected $config = 'ore.config';
}
