<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap PaginationTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PaginationTest extends PHPUnit
{
    
    public function testRender()
    {
        $pagination = new Pagination(3, 'http://www.phpbootstrap.com/');
        $expected = '<nav><ul class="pagination">' 
                  . '<li class="disabled"><a href="http://www.phpbootstrap.com/p/1"><span aria-hidden="true">&laquo;</span></a></li>'
                  . '<li class="active"><a href="http://www.phpbootstrap.com/p/1">1</a></li>'
                  . '<li><a href="http://www.phpbootstrap.com/p/2">2</a></li>'
                  . '<li><a href="http://www.phpbootstrap.com/p/3">3</a></li>'
                  . '<li><a href="http://www.phpbootstrap.com/p/2"><span aria-hidden="true">&raquo;</span></a></li>'
                  . '</ul></nav>';
        $this->assertEquals($expected, $pagination->render());
    }
    
    public function testSetSize()
    {
        $pagination = new Pagination(10);
        $pagination->large();
        $this->assertTrue($pagination->hasClass('pagination-lg'));
        $pagination->small();
        $this->assertFalse($pagination->hasClass('pagination-lg'));
        $this->assertTrue($pagination->hasClass('pagination-sm'));
    }
    
    public function testSetPreviewsLabelAndNextLabel()
    {
        $pagination = new Pagination(3);
        $pagination->href('http://www.phpbootstrap.com/')
                   ->page(3)
                   ->previousLabel('Previous')
                   ->nextLabel('Next');
        
        $expected = '<nav><ul class="pagination">' 
                  . '<li><a href="http://www.phpbootstrap.com/p/2">Previous</a></li>'
                  . '<li><a href="http://www.phpbootstrap.com/p/1">1</a></li>'
                  . '<li><a href="http://www.phpbootstrap.com/p/2">2</a></li>'
                  . '<li class="active"><a href="http://www.phpbootstrap.com/p/3">3</a></li>'
                  . '<li class="disabled"><a href="http://www.phpbootstrap.com/p/3">Next</a></li>'
                  . '</ul></nav>';
        $this->assertEquals($expected, $pagination->render());
    }
    
}
