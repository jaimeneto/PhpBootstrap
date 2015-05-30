<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * LinkTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class LinkTest extends PHPUnit
{
    
    public function testRender()
    {
        $link = new Link(null, '#');
        $this->assertEquals('<a href="#"></a>', $link->render());
    }
    
    public function testSetHrefAndTarget()
    {
        $link = new Link('click me', '#');
        $link->href('/localhost/test')->target('_blank');
        $this->assertEquals('<a href="/localhost/test" target="_blank">click me</a>', $link->render());
    }
    
}
