<?php

/**
 * Created by PhpStorm.
 * User: hong
 * Date: 16-10-20
 * Time: 下午9:52
 */
class LinkPartsDescriptorTest  extends \PHPUnit\Framework\TestCase
{

    protected $domain = 'baidu.com';
    protected $host = 'www.baidu.com';
    protected $protocol = 'http://';
    protected $query = '?test=test';
    protected $path = '/test/';
    protected $file = 'test.php';
    protected $fragment = '#test';

    protected function generateUrl() {
        return $this->protocol.$this->host.$this->path.$this->file.$this->query;
    }
     public function testInit() {

         $LinkParts = new \PhDescriptors\LinkPartsDescriptor($this->generateUrl());

         $this->assertEquals($this->domain, $LinkParts->domain);
         $this->assertEquals($this->host, $LinkParts->host);
         $this->assertEquals($this->protocol, $LinkParts->protocol);
         $this->assertEquals($this->query, $LinkParts->query);
         $this->assertEquals($this->path, $LinkParts->path);
         $this->assertEquals($this->file, $LinkParts->file);

         $LinkPartsNothing = new \PhDescriptors\LinkPartsDescriptor();

         $this->assertEquals('', $LinkPartsNothing->host);

     }

     public function testToArray() {

         $LinkParts = new \PhDescriptors\LinkPartsDescriptor($this->generateUrl());
         $parts = $LinkParts->toArray();
         $this->assertNotEmpty(array_values($parts));

     }

     public function testIsSSL() {

         $LinkParts = new \PhDescriptors\LinkPartsDescriptor($this->generateUrl());

         $this->assertFalse($LinkParts->isSSL());

     }
}
