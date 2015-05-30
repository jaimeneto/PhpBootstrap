<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap DropdownTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class DropdownTest extends PHPUnit
{
    
    public function testRender()
    {
        $dropdown = new Dropdown('Dropdown', [
            'Action'         => '/action',
            'Another action' => '/another-action',
        ], ['id' => 'test']);
        
        $expected = '<div id="test" class="dropdown">'
                  . '<button id="test_button" class="btn btn-default dropdown-toggle" ' 
                  . 'type="button" data-toggle="dropdown" aria-expanded="false">'
                  . 'Dropdown <span class="caret"></span></button>'
                  . '<ul class="dropdown-menu" role="menu" aria-labelledby="test_button">'
                  . '<li role="presentation"><a href="/action" role="menuitem" tabindex="-1">Action</a></li>'
                  . '<li role="presentation"><a href="/another-action" role="menuitem" tabindex="-1">Another action</a></li>'
                  . '</ul></div>';
        $this->assertEquals($expected, $dropdown->render());
    }
    
    public function testMenuRightAndMenuLeft()
    {
        $dropdown = new Dropdown('Dropdown', [
            'Action'         => '/action',
            'Another action' => '/another-action',
        ], ['id' => 'test']);
        $dropdown->menuRight();
        
        $this->assertTrue($dropdown->getUl()->hasClass('dropdown-menu-right'));
        
        $dropdown->menuLeft();
        $this->assertFalse($dropdown->getUl()->hasClass('dropdown-menu-right'));
    }
    
    public function testDropupMenuRightAndGetButton()
    {
        $dropdown = new Dropdown('Dropdown', [
            'Action'         => '/action',
            'Another action' => '/another-action',
        ], ['id' => 'test']);
        $dropdown->up()->menuRight();
        
        $dropdown->getButton()->btnClass('primary');
        
        $expected = '<div id="test" class="dropup">'
                  . '<button id="test_button" class="btn dropdown-toggle btn-primary" ' 
                  . 'type="button" data-toggle="dropdown" aria-expanded="false">'
                  . 'Dropdown <span class="caret"></span></button>'
                  . '<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="test_button">'
                  . '<li role="presentation"><a href="/action" role="menuitem" tabindex="-1">Action</a></li>'
                  . '<li role="presentation"><a href="/another-action" role="menuitem" tabindex="-1">Another action</a></li>'
                  . '</ul></div>';
        $this->assertEquals($expected, $dropdown->render());
    }
      
    public function testMenuHeaderAndDivider()
    {
        $dropdown = new Dropdown('Dropdown', [
            'Dropdown header' => 'HEADER',
            'Action'          => '/action',
            'Divider'         => 'DIVIDER',
            'Another action'  => '/another-action',
        ], ['id' => 'test']);
        
        $expected = '<div id="test" class="dropdown">'
                  . '<button id="test_button" class="btn btn-default dropdown-toggle" ' 
                  . 'type="button" data-toggle="dropdown" aria-expanded="false">'
                  . 'Dropdown <span class="caret"></span></button>'
                  . '<ul class="dropdown-menu" role="menu" aria-labelledby="test_button">'
                  . '<li class="dropdown-header" role="presentation">Dropdown header</li>'
                  . '<li role="presentation"><a href="/action" role="menuitem" tabindex="-1">Action</a></li>'
                  . '<li class="divider" role="presentation"></li>'
                  . '<li role="presentation"><a href="/another-action" role="menuitem" tabindex="-1">Another action</a></li>'
                  . '</ul></div>';
        $this->assertEquals($expected, $dropdown->render());
    }
    
    public function testChangeButton()
    {
        $dropdown = new Dropdown('dd', [
            'Action'         => '/action',
            'Another action' => '/another-action',
        ], ['id' => 'test']);
        $dropdown->setButton('Dropdown', ['class' => 'test']);
        
        $expected = '<div id="test" class="dropdown">'
                  . '<button id="test_button" class="btn btn-default test dropdown-toggle" ' 
                  . 'type="button" data-toggle="dropdown" aria-expanded="false">'
                  . 'Dropdown <span class="caret"></span></button>'
                  . '<ul class="dropdown-menu" role="menu" aria-labelledby="test_button">'
                  . '<li role="presentation"><a href="/action" role="menuitem" tabindex="-1">Action</a></li>'
                  . '<li role="presentation"><a href="/another-action" role="menuitem" tabindex="-1">Another action</a></li>'
                  . '</ul></div>';
        $this->assertEquals($expected, $dropdown->render());
    }
    
}
