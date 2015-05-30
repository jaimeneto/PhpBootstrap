<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Password Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PasswordTest extends PHPUnit
{
    
    public function testElementHasFormControlClass()
    {
        $password = new Password('test');
        $this->assertTrue($password->hasClass('form-control'));
    }
    
    public function testRender()
    {
        $password = new Password('test');
        $this->assertEquals('<input id="form_test" class="form-control" name="test" type="password" />', $password->render());
    }
    
}
