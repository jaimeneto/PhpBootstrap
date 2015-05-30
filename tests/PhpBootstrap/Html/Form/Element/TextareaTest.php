<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Textarea Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class TextareaTest extends PHPUnit
{
    
    public function testElementHasFormControlClass()
    {
        $textarea = new Textarea('test');
        $this->assertTrue($textarea->hasClass('form-control'));
    }
    
    public function testRender()
    {
        $textarea = new Textarea('test');
        $this->assertEquals('<textarea id="form_test" class="form-control" name="test"></textarea>', $textarea->render());
    }
    
    public function testSetRows()
    {
        $textarea = new Textarea('test');
        $textarea->rows(5);
        $this->assertEquals('<textarea id="form_test" class="form-control" name="test" rows="5"></textarea>', $textarea->render());
    }
    
}
