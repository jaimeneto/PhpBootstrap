<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * UlTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class UlTest extends PHPUnit
{
    
    public function testRender()
    {
        $list = new Ul(null);
        $this->assertEquals('<ul></ul>', $list->render());
    }
    
    public function testBootstrapMethods()
    {
        $list = new Ul();
        $list->unstyled();
        $this->assertTrue($list->hasClass('list-unstyled'));
        $list->inline();
        $this->assertFalse($list->hasClass('list-unstyled'));
        $this->assertTrue($list->hasClass('list-inline'));
    }
    
}
