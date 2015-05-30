<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Button Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ButtonTest extends PHPUnit
{
    protected $button;
    
    protected function setUp()
    {
        $this->button = new Button('test', ['label' => 'Push me']);
    }
    
    public function testRenderAsButtonType()
    {
        $this->assertEquals('<button id="form_test" class="btn" name="test" type="button">Push me</button>', $this->button->render());
    }
    
    public function testRenderAsInputType()
    {
        $this->button->input();
        $this->assertEquals('<input id="form_test" class="btn" name="test" value="Push me" type="button" />', $this->button->render());
    }
    
    public function testSetSize()
    {
        $this->button->large();
        $this->assertTrue($this->button->hasClass('btn-lg'));
        
        $this->button->small();
        $this->assertTrue($this->button->hasClass('btn-sm'));
        $this->assertFalse($this->button->hasClass('btn-lg'));
        
        $this->button->extraSmall();
        $this->assertTrue($this->button->hasClass('btn-xs'));
        $this->assertFalse($this->button->hasClass('btn-sm'));
        
        $this->button->size('other');
        $this->assertFalse($this->button->hasClass('btn-other'));
        $this->assertFalse($this->button->hasClass('btn-xs'));
    }
    
    public function testSetBlockLevel()
    {
        $this->button->blockLevel();
        $this->assertTrue($this->button->hasClass('btn-block'));
    }
    
    public function testSetActive()
    {
        $this->button->active();
        $this->assertTrue($this->button->hasClass('active'));
        $this->button->active(false);
        $this->assertFalse($this->button->hasClass('active'));
    }
    
    public function testSetBtnClass()    
    {
        $this->button->btnClass('primary');
        $this->assertTrue($this->button->hasClass('btn-primary'));
        
        $this->button->btnClass('info');
        $this->assertTrue($this->button->hasClass('btn-info'));
        $this->assertFalse($this->button->hasClass('btn-primary'));
        
        $this->button->btnClass('other');
        $this->assertFalse($this->button->hasClass('btn-other'));
        $this->assertFalse($this->button->hasClass('btn-info'));
    }
    
      
    public function testSetType()    
    {
        $this->assertEquals('button', $this->button->getAttrib('type'));
        
        $this->button->type('submit');
        $this->assertEquals('submit', $this->button->getAttrib('type'));
        
        $this->button->type('reset');
        $this->assertEquals('reset', $this->button->getAttrib('type'));
        
        $this->button->type('other');
        $this->assertEquals('button', $this->button->getAttrib('type'));
    }

}
