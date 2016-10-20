<?php

/**
 * Created by PhpStorm.
 * User: hong
 * Date: 16-10-19
 * Time: 下午9:28
 */
class LinkDescriptorTest extends \PHPUnit\Framework\TestCase
{

    public function testInit() {

        $refering_url = $link_raw = $url_rebuild = 'http://www.baidu.com';
        $link_text = 'baidu';
        $url_link_depth = 0;

        $link_code = "<a href=\"$link_raw\" >$link_text</a>";

        $Link = new \PhDescriptors\LinkDescriptor(
           $url_rebuild,
           $link_raw,
           $link_code,
           $link_text,
           $refering_url,
           $url_link_depth
        );

        $this->assertEquals($url_rebuild, $Link->url_rebuild);
        $this->assertEquals($url_link_depth, $Link->url_link_depth);
        $this->assertEquals($link_raw, $Link->link_raw);
        $this->assertEquals($link_text, $Link->link_text);
        $this->assertEquals($link_code, $Link->link_code);
        $this->assertEquals($refering_url, $Link->refering_url);

        $LinkOnlyUrlRebuild = new \PhDescriptors\LinkDescriptor($url_rebuild);

        $this->assertEquals($url_rebuild, $LinkOnlyUrlRebuild->url_rebuild);
        $this->assertNull($LinkOnlyUrlRebuild->link_raw);
    }

}
