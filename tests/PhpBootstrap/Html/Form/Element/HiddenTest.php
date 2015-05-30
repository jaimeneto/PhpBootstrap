<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Hidden Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class HiddenTest extends PHPUnit
{
    
    public function testRender()
    {
        $hidden = new Hidden('test');
        $this->assertEquals('<input id="form_test" name="test" type="hidden" />', $hidden->render());
    }
    
}
