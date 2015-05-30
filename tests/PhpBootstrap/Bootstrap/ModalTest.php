<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap ModalTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ModalTest extends PHPUnit
{
    
    public function testRender()
    {
        $modal = new Modal('Modal body', ['id' => 'myModal', 'header' => 'Modal title']);
        $expected = '<div id="myModal" class="modal fade" role="dialog" '
                  . 'aria-hidden="true" aria-labelledby="myModalLabel">'
                  . '<div class="modal-dialog">'
                  . '<div class="modal-content">'
                  . '<div class="modal-header">'
                  . '<button type="button" class="close" data-dismiss="modal">' 
                  . '<span aria-hidden="true">&times;</span></button>'
                  . '<h4 id="myModalLabel" class="modal-title">Modal title</h4></div>'
                  . '<div class="modal-body">Modal body</div>'
                  . '</div></div></div>';
        
        $this->assertEquals($expected, $modal->render());
    }
        
    public function testSetFooter()
    {
        $modal = new Modal('Modal body', 'Modal title');
        $modal->footer('Modal footer');
        $expected = '<div class="modal fade" role="dialog" aria-hidden="true">'
                  . '<div class="modal-dialog">'
                  . '<div class="modal-content">'
                  . '<div class="modal-header">'
                  . '<button type="button" class="close" data-dismiss="modal">' 
                  . '<span aria-hidden="true">&times;</span></button>'
                  . '<h4 class="modal-title">Modal title</h4></div>'
                  . '<div class="modal-body">Modal body</div>'
                  . '<div class="modal-footer">Modal footer</div>'
                  . '</div></div></div>';
        
        $this->assertEquals('<div class="modal-footer">Modal footer</div>', $modal->getModalFooter()->render());
        $this->assertEquals($expected, $modal->render());
    }
    
    public function testSetSize()
    {
        $modal = new Modal('Modal body', 'Modal title');
        $modal->large();
        $this->assertTrue($modal->getModalDialog()->hasClass('modal-lg'));
        $modal->small();
        $this->assertFalse($modal->getModalDialog()->hasClass('modal-lg'));
        $this->assertTrue($modal->getModalDialog()->hasClass('modal-sm'));
    }
    
    public function testSetHeader()
    {
        $modal = new Modal('Modal body', ['id' => 'myModal']);
        $modal->header('Modal title', 'h3', 'Close');
        $expected = '<div class="modal-header">'
                  . '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' 
                  . '<span aria-hidden="true">&times;</span></button>'
                  . '<h3 id="myModalLabel" class="modal-title">Modal title</h3></div>';
        $this->assertEquals($expected, $modal->getModalHeader()->render());
    }
    
}
