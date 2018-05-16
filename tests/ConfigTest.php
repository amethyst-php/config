<?php

namespace Railken\LaraOre\Config\Tests;

use Railken\Bag;
use Railken\LaraOre\Config\ConfigManager;

/**
 * Testing config
 * Attributes
 */
class ConfigTest extends BaseTest
{
    use Traits\CommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new ConfigManager();
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
    
        $bag = new bag();
        $bag->set('key', str_random(40));
        $bag->set('value', str_random(40));
        return $bag;
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getmanager(), $this->getParameters());
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

}
