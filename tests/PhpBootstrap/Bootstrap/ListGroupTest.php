<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap ListGroupTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class UlTest extends PHPUnit
{
    
    public function testRender()
    {
        $list = new ListGroup(null, ['id' => 'myList']);
        $this->assertEquals('<ul id="myList" class="list-group"></ul>', $list->render());
    }
    
    public function testListGroup()
    {
        $list = new ListGroup(['item 1', 'item 2']);
        $expected = '<ul class="list-group">' 
                  . '<li class="list-group-item">item 1</li>' 
                  . '<li class="list-group-item">item 2</li></ul>';
        $this->assertEquals($expected, $list->render());
    }
    
}
