<?php

namespace Railken\LaraOre\Config\Tests;

use Illuminate\Support\Facades\File;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\Laravel\Manager\ManagerServiceProvider::class,
            \Railken\Laravel\App\AppServiceProvider::class,
            \Railken\LaraOre\Config\ConfigServiceProvider::class,
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

        File::cleanDirectory(database_path("migrations/"));


        $this->artisan('vendor:publish', [
            '--provider' => 'Railken\LaraOre\Config\ConfigServiceProvider',
            '--tag' => 'config'
        ]);


        $this->artisan('vendor:publish', [
            '--provider' => 'Railken\LaraOre\Config\ConfigServiceProvider',
            '--tag' => 'migrations'
        ]);


        $this->artisan('migrate:fresh');
        $this->artisan('migrate');
    }
}