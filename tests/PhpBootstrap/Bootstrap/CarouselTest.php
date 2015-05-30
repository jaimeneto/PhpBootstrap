<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Img;

/**
 * Bootstrap CarouselTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class CarouselTest extends PHPUnit
{
    private $carousel;
    
    protected function setUp()
    {
        $this->carousel = new Carousel([
            [
                'img'         => 'image1.jpg',
                'title'       => 'Image 1',
                'description' => 'Description for image 1',
                'active'      => true
            ], [
                'img'         => 'image2.jpg',
                'title'       => 'Image 2',
                'description' => 'Description for image 2'
            ], [
                'img'         => new Img('image3.jpg'),
                'title'       => 'Image 3',
                'description' => 'Description for image 3',
            ]
        ], 'test');
    }
    
    public function testRender()
    {
        $this->carousel->setPreviousLabel('Anterior');
        $this->carousel->setNextLabel('Próximo');
        
        $expected = '<div id="test" class="carousel slide" data-ride="carousel">'
                  . '<ol class="carousel-indicators">'
                  . '<li class="active" data-target="#test" data-slide-to="0"></li>'
                  . '<li data-target="#test" data-slide-to="1"></li>'
                  . '<li data-target="#test" data-slide-to="2"></li>'
                  . '</ol>'
                  . '<div class="carousel-inner" role="listbox">'
                
                  . '<div class="item active">'
                  . '<img src="image1.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 1</h3>'
                  . '<p>Description for image 1</p>'
                  . '</div>'
                  . '</div>'
                
                  . '<div class="item">'
                  . '<img src="image2.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 2</h3>'
                  . '<p>Description for image 2</p>'
                  . '</div>'
                  . '</div>'
                
                  . '<div class="item">'
                  . '<img src="image3.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 3</h3>'
                  . '<p>Description for image 3</p>'
                  . '</div>'
                  . '</div>'
                
                  . '</div>'
                  . '<a class="left carousel-control" href="#test" role="button" data-slide="prev">'
                  . '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>'
                  . '<span class="sr-only">Anterior</span>'
                  . '</a>'
                  . '<a class="right carousel-control" href="#test" role="button" data-slide="next">'
                  . '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                  . '<span class="sr-only">Próximo</span>'
                  . '</a>'
                  . '</div>';
        
        $this->assertEquals($expected, $this->carousel->render());
    }
    
    public function testHideControlsAndIndicators()
    {
        $this->carousel->hideControls();
        $this->carousel->hideIndicators();
        
        $expected = '<div id="test" class="carousel slide" data-ride="carousel">'
                  . '<div class="carousel-inner" role="listbox">'
                
                  . '<div class="item active">'
                  . '<img src="image1.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 1</h3>'
                  . '<p>Description for image 1</p>'
                  . '</div>'
                  . '</div>'
                
                  . '<div class="item">'
                  . '<img src="image2.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 2</h3>'
                  . '<p>Description for image 2</p>'
                  . '</div>'
                  . '</div>'
                
                  . '<div class="item">'
                  . '<img src="image3.jpg" />'
                  . '<div class="carousel-caption">'
                  . '<h3>Image 3</h3>'
                  . '<p>Description for image 3</p>'
                  . '</div>'
                  . '</div>'
                
                  . '</div></div>';
        
        $this->assertEquals($expected, $this->carousel->render());
    }
    
}
