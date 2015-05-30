<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Email Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class EmailTest extends PHPUnit
{
    
    public function testRender()
    {
        $email = new Email('email');
        $this->assertEquals('<input id="form_email" class="form-control" name="email" type="email" />', $email->render());
    }
    
}
