<?php

namespace PhpBootstrap\Html\Form\Decorator;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Form\Element\Text;

/**
 * Form Label Decorator Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class LabelTest extends PHPUnit
{
    
    public function testSetPlacementBefore()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label'/*, 'placement' => 'before'*/]); // Before is the default placement
        
        $expected = '<label for="form_test">Test Label</label>'
                  . '<input id="form_test" class="form-control" name="test" type="text" />';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementAfter()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label', 'placement' => 'after']);
        
        $expected = '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '<label for="form_test">Test Label</label>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementWrap()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label', 'placement' => 'wrap']);
        
        $expected = '<label for="form_test">' 
                  . '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '</label>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementAppend()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label', 'placement' => 'append']);
        
        $expected = '<label for="form_test">Test Label ' 
                  . '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '</label>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementPrepend()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label', 'placement' => 'prepend']);
        
        $expected = '<label for="form_test">' 
                  . '<input id="form_test" class="form-control" name="test" type="text" />'
                  . ' Test Label</label>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testGetFor()
    {
        $text = new Text('test', ['label' => 'Test Label']);
        $text->addDecorator('label', ['name' => 'label']);        
        $this->assertEquals('form_test', $text->getDecorator('label')->getFor());
    }
    
}
