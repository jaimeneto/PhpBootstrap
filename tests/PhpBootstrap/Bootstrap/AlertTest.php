<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap AlertTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class AlertTest extends PHPUnit
{
    
    public function testRender()
    {
        $alert = new Alert('alert message', 'warning');
        $expected = '<div class="alert alert-warning" role="alert">alert message</div>';
        $this->assertEquals($expected, $alert->render());
    }
    
    public function testSetDismissible()
    {
        $alert = new Alert('alert message', ['dismissible' => 'Fechar']);
        $expected = '<div class="alert alert-dismissible" role="alert">'
                  . '<button type="button" class="close" ' 
                  . 'data-dismiss="alert" aria-label="Fechar">' 
                  . '<span aria-hidden="true">&times;</span></button>'
                  . 'alert message</div>';
        $this->assertEquals($expected, $alert->render());
    }
    
    public function testSetAlertStytle()
    {
        $alert = new Alert('alert message');
        $alert->alertStyle('success');
        $this->assertTrue($alert->hasClass('alert-success'));
        $alert->alertStyle(null);
        $this->assertFalse($alert->hasClass('alert-success'));
    }
    
}
