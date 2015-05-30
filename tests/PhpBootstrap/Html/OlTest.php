<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * OlTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class OlTest extends PHPUnit
{
    
    public function testRender()
    {
        $list = new Ol(null);
        $this->assertEquals('<ol></ol>', $list->render());
    }
    
    public function testSetAndGetItemsAndAddItem()
    {
        $list = new Ol(['item 1', 'item 2']);
        $list->addItem('item 3', ['class' => 'teste']);
        $list->addItem(['class' => 'teste']);
        $list->addItem(['content' => 'item 5', 'class' => 'teste']);
        $expected = '<ol><li>item 1</li><li>item 2</li>' 
                  . '<li class="teste">item 3</li>' 
                  . '<li class="teste"></li>' 
                  . '<li class="teste">item 5</li></ol>';
        
        $items = $list->getItems();
        $this->assertCount(5, $items);
        $this->assertInstanceOf('\PhpBootstrap\Html\Tag', $items[0]);
        $this->assertEquals('li', $items[0]->getTag());
        $this->assertEquals($expected, $list->render());
    }
    
    
}
