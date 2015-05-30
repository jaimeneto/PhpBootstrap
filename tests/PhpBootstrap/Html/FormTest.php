<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * FormTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class FormTest extends PHPUnit
{
    private $form;
    
    protected function setUp()
    {
        $this->form = new Form();
    }
    
    public function testRender()
    {
        $this->assertEquals('<form method="post"></form>', $this->form->render());
    }
    
    public function testBeginAndEnd()
    {
        $this->form->action('/post/add');
        $this->assertEquals('<form action="/post/add" method="post">', $this->form->begin());
        $this->assertEquals('</form>', $this->form->end());
    }
        
    public function testDisposition()
    {
        $this->form->horizontal();
        $this->assertTrue($this->form->hasClass('form-horizontal'));
        $this->form->inline();
        $this->assertTrue($this->form->hasClass('form-inline'));
        $this->form->vertical();
        $this->assertFalse($this->form->hasClass('form-horizontal'));
        $this->assertFalse($this->form->hasClass('form-inline'));
    }
    
//    public function testAddAndGetElement()
//    {
//        $this->form->addElement('text', 'description', ['value' => 'test']);
//        $this->assertEquals('test', $this->form->getElement('description')->getValue());
//    }
    
}
