<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap TabsTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class TabsTest extends PHPUnit
{
    
    public function testRender()
    {
        $tabs = new Tabs([
            ['content' => 'Home', 'href' => '/home', 'active' => true], 
            ['content' => 'Contact', 'href' => '/contact', 'disabled' => true],
            'About' => '/about'
        ], ['id' => 'myTabs']);
        $expected = '<ul id="myTabs" class="nav nav-tabs">' 
                  . '<li class="active" role="presentation"><a href="/home">Home</a></li>'
                  . '<li class="disabled" role="presentation"><a href="/contact">Contact</a></li>'
                  . '<li role="presentation"><a href="/about">About</a></li>' 
                  . '</ul>';
        $this->assertEquals($expected, $tabs->render());
    }
    
    public function testNavJustifiedAndNavStacked()
    {
        $tabs = new Tabs();
        $tabs->navJustified();
        $this->assertTrue($tabs->hasClass('nav-justified'));
        $tabs->navStacked();
        $this->assertFalse($tabs->hasClass('nav-justified'));
        $this->assertTrue($tabs->hasClass('nav-stacked'));
    }
    
}
