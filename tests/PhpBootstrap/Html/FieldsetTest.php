<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * FieldsetTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class FieldsetTest extends PHPUnit
{
    
    public function testRender()
    {
        $fieldset = new Fieldset(null);
        $this->assertEquals('<fieldset></fieldset>', $fieldset->render());
    }
    
    public function testSetLegend()
    {
        $fieldset = new Fieldset('Content text', 'Legend text');
        $this->assertEquals('<fieldset><legend>Legend text</legend>Content text</fieldset>', $fieldset->render());
    }
    
}
