<?php

namespace Railken\LaraOre\Config\Tests;

use Illuminate\Support\Facades\File;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\ConfigServiceProvider::class,
        ];
    }
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/..', '.env');
        $dotenv->load();

        parent::setUp();
        
        $this->artisan('migrate:fresh');
        $this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\ConfigServiceProvider', '--force' => true]);
        $this->artisan('lara-ore:user:install');
        $this->artisan('migrate');
    }
}
