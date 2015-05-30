<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Radio Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class RadioTest extends PHPUnit
{    
    private $radio;
    
    protected function setUp()
    {
        $this->radio = new Radio('test', ['label' => 'Check me']);
    }
    
    public function testRender()
    {
        $expected = '<div class="radio"><label>'
                  . '<input id="form_test" name="test" value="1" type="radio" /> Check me</label></div>';
        
        $this->assertEquals($expected, $this->radio->render());
    }
    
    public function testSetInlineTrue()
    {
        $this->radio->inline();
        $expected = '<div class="radio-inline"><label>'
                  . '<input id="form_test" name="test" value="1" type="radio" /> Check me</label></div>';
        
        $this->assertEquals($expected, $this->radio->render());
    }
    
    public function testSetCheckedAndIsChecked()
    {
        $this->radio->check();
        $expected = '<div class="radio"><label>'
                  . '<input id="form_test" name="test" value="1" type="radio" checked />' 
                  . ' Check me</label></div>';
        
        $this->assertTrue($this->radio->isChecked());
        $this->assertEquals($expected, $this->radio->render());
        
        $this->radio->uncheck();
        $this->assertFalse($this->radio->isChecked());
    }
    
    public function testDisabled()
    {
        $this->radio->disabled();
        $expected = '<div class="radio disabled"><label>'
                  . '<input id="form_test" name="test" value="1" type="radio" disabled />' 
                  . ' Check me</label></div>';
        $this->assertEquals($expected, $this->radio->render());
    }
    
}
