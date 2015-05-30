<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * DlTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class DlTest extends PHPUnit
{
    
    public function testRender()
    {
        $list = new Dl(null);
        $this->assertEquals('<dl></dl>', $list->render());
    }
    
    public function testSetItemsGroup()
    {
        $list = new Dl(['dt1' => 'dd1', 'dt2' => 'dd2'], ['class' => 'test']);
        $expected = '<dl class="test">' 
                  . '<dt>dt1</dt><dd>dd1</dd>' 
                  . '<dt>dt2</dt><dd>dd2</dd>' 
                  . '</dl>';
        $this->assertEquals($expected, $list->render());
    }
    
    public function testAddItemGroup()
    {
        $list = new Dl();
        $list->addItem('dt1', 'dd1', ['class' => 'dd-class']);
        $list->addItem('dt2', 'dd2', ['dt' => ['class' => 'dt-class'], 'dd' => ['class' => 'dd-class']]);
        $list->addItem(['content' => 'dt3', 'class' => 'dt-class'], ['content' => 'dd3', 'class' => 'dd-class']);
        $expected = '<dl>' 
                  . '<dt>dt1</dt><dd class="dd-class">dd1</dd>' 
                  . '<dt class="dt-class">dt2</dt><dd class="dd-class">dd2</dd>' 
                  . '<dt class="dt-class">dt3</dt><dd class="dd-class">dd3</dd>'   
                  . '</dl>';
        
        $this->assertEquals('dt', $list->getItems()[0]['dt']->getTag());
        $this->assertEquals($expected, $list->render());
    }
    
}
