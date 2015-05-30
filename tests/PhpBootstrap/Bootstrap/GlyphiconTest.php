<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap GlyphiconTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class GlyphiconTest extends PHPUnit
{
    
    public function testRender()
    {
        $icon = new Glyphicon('user');
        $this->assertEquals('<span class="glyphicon glyphicon-user"></span>', $icon->render());
    }
    
    public function testChangeIcon()
    {
        $icon = new Glyphicon('user');
        $icon->setIcon('plus');
        $this->assertEquals('<span class="glyphicon glyphicon-plus"></span>', $icon->render());
    }
    
}
