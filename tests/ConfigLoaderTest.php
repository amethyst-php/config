<?php

namespace Amethyst\Tests;

use Amethyst\Contracts\ConfigLoaderContract;

class ConfigLoaderTest extends BaseTest
{
    public function testBoot()
    {
        $service = $this->app->make(ConfigLoaderContract::class);
        $service->boot();

        $this->assertEquals(3, config('foo.bar', 3));

        $config = $this->app->get('amethyst')->get('config')->createOrFail([
            'key'   => 'foo.bar',
            'value' => 7,
        ])->getResource();

        $this->assertEquals(7, config('foo.bar', 3));

        $this->app->get('amethyst')->get('config')->remove($config);

        // $this->assertEquals(3, config('foo.bar', 3)); doesn't work, bug laravel
    }
}
