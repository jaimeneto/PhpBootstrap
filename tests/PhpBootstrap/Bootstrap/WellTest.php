<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap WellTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class WellTest extends PHPUnit
{
    
    public function testRender()
    {
        $well = new Well('well content', ['size' => 'lg']);
        $this->assertEquals('<div class="well well-lg">well content</div>', $well->render());
    }
    
    public function testSetOptionsAsString()
    {
        $well = new Well('well content', 'lg');
        $this->assertEquals('<div class="well well-lg">well content</div>', $well->render());
    }
    
    public function testSetSize()
    {
        $well = new Well('well content');
        $well->large();
        $this->assertTrue($well->hasClass('well-lg'));
        $well->small();
        $this->assertFalse($well->hasClass('well-lg'));
        $this->assertTrue($well->hasClass('well-sm'));
    }
    
}
