<?php

namespace PhpBootstrap\Html\Form\Decorator;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Form\Element\Text;

/**
 * Form HelpBlock Decorator Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class HelpBlockTest extends PHPUnit
{
    public function testRenderDecoratorContent()
    {
        $text = new Text('test');
        $text->addDecorator('helpblock', [
            'name'      => 'helpblock', 
            'content'   => 'This is a help text!'
        ]);
        
        $expected = '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '<span class="help-block">This is a help text!</span>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementAfter()
    {
        $text = new Text('test');
        $text->addDecorator('helpblock', ['name' => 'helpblock'/*, 'placement' => 'after'*/]); // After is the default placement
        $text->setHelp('This is a help text!');
        
        $expected = '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '<span class="help-block">This is a help text!</span>';
        $this->assertEquals($expected, $text->render());
    }
    
    public function testSetPlacementBefore()
    {
        $text = new Text('test');
        $text->addDecorator('helpblock', ['name' => 'helpblock', 'placement' => 'before']);
        $text->setHelp('This is a help text!');
        
        $expected = '<span class="help-block">This is a help text!</span>'
                  . '<input id="form_test" class="form-control" name="test" type="text" />';
        $this->assertEquals($expected, $text->render());
    }
    
}
