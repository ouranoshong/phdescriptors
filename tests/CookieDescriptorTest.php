<?php

/**
 * Created by PhpStorm.
 * User: hong
 * Date: 16-10-20
 * Time: 下午9:43
 */
class CookieDescriptorTest extends \PHPUnit\Framework\TestCase
{
    protected $header_cookie = 'VISITOR=4c63394c2d82e31552001a58; expires="Sat, 08-Aug-2020 23:59:08 GMT"; Path=/; domain=.baidu.com';
    protected $source_url = 'http://www.baidu.com';
    public function testGetFromHeaderLine() {
        $Cookie = \PhDescriptors\CookieDescriptor::getFromHeaderLine($this->header_cookie, $this->source_url);

        $this->assertEquals('VISITOR', $Cookie->name);
    }
}
