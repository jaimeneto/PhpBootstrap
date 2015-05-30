<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap PillsTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PillsTest extends PHPUnit
{
    
    public function testRender()
    {
        $pills = new Pills([
            ['content' => 'Home', 'href' => '/home', 'active' => true], 
            'About' => '/about'
        ]);
        $expected = '<ul class="nav nav-pills">' 
                  . '<li class="active" role="presentation"><a href="/home">Home</a></li>'
                  . '<li role="presentation"><a href="/about">About</a></li>'
                  . '</ul>';
        $this->assertEquals($expected, $pills->render());
    }
    
}
