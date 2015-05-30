<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * ImgTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ImgTest extends PHPUnit
{
    
    public function testRender()
    {
        $img = new Img('/img/test.jpg');
        $this->assertEquals('<img src="/img/test.jpg" />', $img->render());
    }
    
    public function testSetAttribs()
    {
        $img = new Img('/img/test.jpg', ['alt' => 'image', 'title' => 'image']);
        $this->assertEquals('<img alt="image" title="image" src="/img/test.jpg" />', $img->render());
    }
    
    public function testSetWidthAndHeight()
    {
        $img = new Img('/img/test.jpg');
        $img->width(100)->height(80);
        $this->assertEquals('100', $img->getAttrib('width'));
        $this->assertEquals('80', $img->getAttrib('height'));
    }
    
    public function testBootstrapMethods()
    {
        $img = new Img('/img/test.jpg', ['class' => 'image']);
        $img->responsive()->circle()->thumbnail();
        $this->assertEquals('<img class="image img-responsive img-circle img-thumbnail" src="/img/test.jpg" />', $img->render());
        $img->rounded();
        $this->assertEquals('<img class="image img-responsive img-rounded" src="/img/test.jpg" />', $img->render());
    }
    
}
