<?php

namespace Railken\LaraOre\Config\Tests;

use Railken\LaraOre\Config\ConfigManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;

class ManagerTest extends BaseTest
{
    use ManagerTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new ConfigManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), $this->getParameters());
    }

    public function testNotDefined()
    {
        $manager = $this->getManager();
        $this->assertArraySubset([['code' => 'CONFIG_KEY_NOT_DEFINED']], $manager->create($this->getParameters()->remove('key'))->getSimpleErrors()->toArray());
        $this->assertArraySubset([['code' => 'CONFIG_VALUE_NOT_DEFINED']], $manager->create($this->getParameters()->remove('value'))->getSimpleErrors()->toArray());
    }

    public function testNotValid()
    {
        $manager = $this->getManager();
        $this->assertArraySubset([['code' => 'CONFIG_KEY_NOT_VALID']], $manager->create($this->getParameters()->set('key', ''))->getSimpleErrors()->toArray());
        //$this->assertArraySubset([['code' => 'CONFIG_VALUE_NOT_VALID']], $manager->create($this->getParameters()->set('value', ''))->getSimpleErrors()->toArray());
    }

    public function testNotUnique()
    {
        $manager = $this->getManager();
        $manager->create($this->getParameters()->set('key', 'unique'));
        $this->assertArraySubset([['code' => 'CONFIG_KEY_NOT_UNIQUE']], $manager->create($this->getParameters()->set('key', 'unique'))->getSimpleErrors()->toArray());
    }

    public function testLoadConfig()
    {
        $result = $this->getManager()->create($this->getParameters()->set('key', 'mail_host')->set('value', 'testdummy'));
        $this->assertEquals(true, $result->ok());
        $this->getManager()->loadConfig();
        $this->assertEquals('testdummy', \Illuminate\Support\Facades\Config::get('mail.host'));
    }
}
