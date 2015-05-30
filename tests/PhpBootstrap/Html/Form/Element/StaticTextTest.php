<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form StaticText Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class StaticTextTest extends PHPUnit
{
    
    public function testElementHasFormControlClass()
    {
        $staticText = new StaticText('test');
        $this->assertTrue($staticText->hasClass('form-control-static'));
    }
    
    public function testRender()
    {
        $staticText = new StaticText('test', ['value' => 'testing']);
        $this->assertEquals('<p id="form_test" class="form-control-static">testing</p>', $staticText->render());
    }
    
}
