<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap PageHeaderTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PageHeaderTest extends PHPUnit
{
    
    public function testRender()
    {
        $pageHeader = new PageHeader('The title', ['smallContent' => 'extra info']);
        $expected = '<div class="page-header"><h1>The title <small>extra info</small></h1></div>';
        $this->assertEquals($expected, $pageHeader->render());
    }
    
    public function testSetOptionsAsString()
    {
        $pageHeader = new PageHeader('The title', 'extra info');
        $expected = '<div class="page-header"><h1>The title <small>extra info</small></h1></div>';
        $this->assertEquals($expected, $pageHeader->render());
    }
    
}
