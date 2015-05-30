<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Text Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class TextTest extends PHPUnit
{
    
    public function testElementHasFormControlClass()
    {
        $text = new Text('test');
        $this->assertTrue($text->hasClass('form-control'));
    }
    
    public function testRender()
    {
        $text = new Text('test');
        $this->assertEquals('<input id="form_test" class="form-control" name="test" type="text" />', $text->render());
    }
    
}
