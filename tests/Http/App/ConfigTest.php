<?php

namespace Railken\Amethyst\Tests\Http\App;

use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Api\Support\Testing\TestableBaseTrait;
use Railken\Amethyst\Fakers\ConfigFaker;
use Railken\Amethyst\Managers\ConfigManager;
use Railken\Amethyst\Tests\BaseTest;

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
    protected $group = 'app';

    /**
     * Base path config.
     *
     * @var string
     */
    protected $config = 'amethyst.config';

    /**
     * List of routes.
     *
     * @param array
     */
    protected $routes = [
        'index',
    ];

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        // Create a new config record
        (new ConfigManager())->createOrFail(ConfigFaker::make()->parameters()->set('visibility', 'public')->toArray());
    }
}
