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
        $this->commonTest(new ConfigManager(), $this->getParameters());
    }

}
