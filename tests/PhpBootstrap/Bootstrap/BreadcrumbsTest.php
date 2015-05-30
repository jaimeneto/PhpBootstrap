<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap BreadcrumbsTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class BreadcrumbsTest extends PHPUnit
{
    
    public function testRender()
    {
        $breadcrumbs = new Breadcrumbs([
            'Home' => '/home',
            ['content' => 'Library', 'href' => '/library'],
            ['content' => 'Data', 'href' => '/data', 'active' => true],
        ], ['id' => 'myBreadcrumbs']);
        $expected = '<ol id="myBreadcrumbs" class="breadcrumb">'
                  . '<li><a href="/home">Home</a></li>'
                  . '<li><a href="/library">Library</a></li>'
                  . '<li class="active">Data</li>'
                  . '</ol>';
        
        $this->assertEquals($expected, $breadcrumbs->render());
    }
        
}
