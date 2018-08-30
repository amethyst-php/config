<?php

namespace Railken\LaraOre\Config\Tests;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Support\Testing\TestableTrait;
use Railken\LaraOre\Config\ConfigFaker;

class ApiTest extends BaseTest
{
    use TestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Config::get('ore.api.router.prefix').Config::get('ore.config.http.admin.router.prefix');
    }

    /**
     * Test common requests.
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), ConfigFaker::make()->parameters());
    }
}
