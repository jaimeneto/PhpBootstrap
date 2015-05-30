<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap LabelTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class LabelTest extends PHPUnit
{
    
    public function testRender()
    {
        $label = new Label('label content');
        $this->assertEquals('<span class="label" role="label">label content</span>', $label->render());
    }
    
    public function testChangeLabelStyle()
    {
        $label = new Label('label content', 'default');
        $label->labelStyle('primary');
        $this->assertEquals('<span class="label label-primary" role="label">label content</span>', $label->render());
    }
    
}
