<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Checkbox Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class CheckboxTest extends PHPUnit
{    
    private $checkbox;
    
    protected function setUp()
    {
        $this->checkbox = new Checkbox('test', ['label' => 'Check me']);
    }
    
    public function testRender()
    {
        $expected = '<div class="checkbox"><label>'
                  . '<input name="test" value="0" type="hidden" />'
                  . '<input id="form_test" name="test" value="1" type="checkbox" /> Check me</label></div>';
        
        $this->assertEquals($expected, $this->checkbox->render());
    }
     
    public function testSetInlineTrue()
    {
        $this->checkbox->inline();
        $expected = '<div class="checkbox-inline"><label>'
                  . '<input name="test" value="0" type="hidden" />'
                  . '<input id="form_test" name="test" value="1" type="checkbox" /> Check me</label></div>';
        
        $this->assertEquals($expected, $this->checkbox->render());
    }
    
    public function testRenderWithoutHiddenUncheckedValue()
    {
        $this->checkbox->insertHiddenUncheckedValue(false);
        $expected = '<div class="checkbox"><label>'
          . '<input id="form_test" name="test" value="1" type="checkbox" /> Check me</label></div>';
        
        $this->assertEquals($expected, $this->checkbox->render());
    }
    
    public function testSetCheckedAndIsChecked()
    {
        $this->checkbox->check();
        $expected = '<div class="checkbox"><label>'
                  . '<input name="test" value="0" type="hidden" />'
                  . '<input id="form_test" name="test" value="1" type="checkbox" checked />' 
                  . ' Check me</label></div>';
        
        $this->assertTrue($this->checkbox->isChecked());
        $this->assertEquals($expected, $this->checkbox->render());
        
        $this->checkbox->uncheck();
        $this->assertFalse($this->checkbox->isChecked());
    }
    
    public function testDisabled()
    {
        $this->checkbox->disabled();
        $expected = '<div class="checkbox disabled"><label>'
                  . '<input name="test" value="0" type="hidden" />'
                  . '<input id="form_test" name="test" value="1" type="checkbox" disabled />' 
                  . ' Check me</label></div>';
        $this->assertEquals($expected, $this->checkbox->render());
    }
    
}
