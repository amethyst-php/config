<?php

namespace Amethyst\Tests\Http\App;

use Illuminate\Support\Facades\Config;
use Amethyst\Api\Support\Testing\TestableBaseTrait;
use Amethyst\Fakers\ConfigFaker;
use Amethyst\Managers\ConfigManager;
use Amethyst\Tests\BaseTest;

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
     * Route name.
     *
     * @var string
     */
    protected $route = 'app.config';

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create a new config record
        (new ConfigManager())->createOrFail(ConfigFaker::make()->parameters()->set('visibility', 'public')->toArray());
    }
}
