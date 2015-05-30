<?php

namespace PhpBootstrap\Html\Form\Decorator;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Form\Element\Text;

/**
 * Form InputGroup Decorator Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class InputGroupTest extends PHPUnit
{
    
    public function testRender()
    {
        $text = new Text('test');
        $text->addDecorator('inputGroup', [
            'prependAddon' => '@',
            'appendAddon'  => '*'
        ]);
        
        $expected = '<div class="input-group">'
                  . '<span class="input-group-addon">@</span>'
                  . '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '<span class="input-group-addon">*</span>'
                  . '</div>';
        $this->assertEquals($expected, $text->render());
    }
    
}
