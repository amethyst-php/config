<?php

namespace Railken\LaraOre\Tests\Config;

use Illuminate\Support\Facades\Config;
use Railken\Bag;
use Railken\LaraOre\Config\ConfigFaker;
use Railken\LaraOre\Api\Support\Testing\TestableBaseTrait;

class ApiTest extends BaseTest
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

    /**
     * Test application.
     */
    public function testApp()
    {
        $url = Config::get('ore.api.http.app.router.prefix').Config::get('ore.config.http.app.router.prefix');

        $this->callAndTest('GET', $url, [], 200);
        $this->callAndTest('GET', $url, ['query' => 'id eq 1'], 200);
    }
}
