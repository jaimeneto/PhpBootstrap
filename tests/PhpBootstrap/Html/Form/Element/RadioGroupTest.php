<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form RadioGroup Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class RadioGroupTest extends PHPUnit
{    
    
    public function testRender()
    {
        $radioGroup = new RadioGroup('test', [
            'items' => ['M' => 'Male', 'F' => 'Female'], 
            'value' => 'F'
        ]);
        
        $expected = '<div id="form_test" class="radio-group">'
                  . '<div class="radio"><label>'
                  . '<input id="form_test_m" name="test" value="M" type="radio" /> Male' 
                  . '</label></div>'
                  . '<div class="radio"><label>'
                  . '<input id="form_test_f" name="test" value="F" type="radio" checked /> Female' 
                  . '</label></div>'
                  . '</div>';
        
        $this->assertEquals($expected, $radioGroup->render());
    }
    
    public function testAddItem()
    {
        $radioGroup = new RadioGroup('test');
        $radioGroup->setItems(['M' => 'Male', 'F' => 'Female']);
        $radioGroup->addItem('None');
        
        $expected = '<div id="form_test" class="radio-group">'
                  . '<div class="radio"><label>'
                  . '<input id="form_test_m" name="test" value="M" type="radio" /> Male' 
                  . '</label></div>'
                  . '<div class="radio"><label>'
                  . '<input id="form_test_f" name="test" value="F" type="radio" /> Female' 
                  . '</label></div>'
                  . '<div class="radio"><label>'
                  . '<input id="form_test_none" name="test" value="None" type="radio" /> None' 
                  . '</label></div>'
                  . '</div>';
        
        $this->assertEquals($expected, $radioGroup->render());
    }
    
}
