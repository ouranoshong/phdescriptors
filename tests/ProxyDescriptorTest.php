<?php

/**
 * Created by PhpStorm.
 * User: hong
 * Date: 16-10-20
 * Time: 下午9:41
 */
class ProxyDescriptorTest  extends \PHPUnit\Framework\TestCase
{
    public function testInit() {
        $Proxy = new \PhDescriptors\ProxyDescriptor();

        $this->assertEquals(true, $Proxy instanceof \PhDescriptors\ProxyDescriptor);
    }

}
