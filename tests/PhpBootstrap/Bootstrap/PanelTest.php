<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap PanelTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PanelTest extends PHPUnit
{
    
    public function testRender()
    {
        $panel = new Panel();
        $this->assertEquals('<div class="panel panel-default"></div>', $panel->render());
    }
    
    public function testSetOptionsAsString()
    {
        $panel = new Panel('Panel body', 'Panel heading');
        $expected = '<div class="panel panel-default">'
                  . '<div class="panel-heading">Panel heading</div>' 
                  . '<div class="panel-body">Panel body</div>' 
                  . '</div>';
        $this->assertEquals($expected, $panel->render());
    }
     
    public function testPanelWithBodyHeadingAndFooter()
    {
        $panel = new Panel('Panel body', ['heading' => 'Panel heading', 'footer' => 'Panel footer']);
        $expected = '<div class="panel panel-default">'
                  . '<div class="panel-heading">Panel heading</div>' 
                  . '<div class="panel-body">Panel body</div>' 
                  . '<div class="panel-footer">Panel footer</div>'
                  . '</div>';
        $this->assertEquals($expected, $panel->render());
    }
    
    public function testSetHeadingWithDifferentPanelTag()
    {
        $panel = new Panel();
        $panel->setHeading('Panel title', 'h3');
        $expected = '<div class="panel panel-default">'
                  . '<div class="panel-heading"><h3 class="panel-title">Panel title</h3></div>' 
                  . '</div>';
        $this->assertEquals($expected, $panel->render());
    }
    
    public function testSetPanelStyle()
    {
        $panel = new Panel();
        $panel->panelStyle('primary');
        $this->assertTrue($panel->hasClass('panel-primary'));
        $panel->panelStyle();
        $this->assertFalse($panel->hasClass('panel-primary'));
        $this->assertTrue($panel->hasClass('panel-default'));
    }
    
}
