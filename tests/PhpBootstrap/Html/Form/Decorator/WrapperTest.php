<?php

namespace PhpBootstrap\Html\Form\Decorator;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Form\Element\Text;

/**
 * Form Wrapper Decorator Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class WrapperTest extends PHPUnit
{
    
    public function testRender()
    {
        $text = new Text('test');
        $text->addDecorator('wrapper', [
            'name'  => 'formgroup',
            'class' => 'form-group'
        ]);
        
        $expected = '<div class="form-group">'
                  . '<input id="form_test" class="form-control" name="test" type="text" />'
                  . '</div>';
        $this->assertEquals($expected, $text->render());
    }
    
}
