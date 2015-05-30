<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form File Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class FileTest extends PHPUnit
{
    
    public function testRender()
    {
        $file = new File('test');
        $expected = '<input id="form_test" name="test" type="file" />';
        $this->assertEquals($expected, $file->render());
    }
    
    public function testAddAccept()
    {
        $file = new File('test');
        $file->setAccept('.bmp');
        $file->setAccept(['.gif', '.jpg', '.png']);
        $expected = '<input id="form_test" name="test" type="file" accept=".gif,.jpg,.png" />';
        $this->assertEquals($expected, $file->render());
    }
    
}
