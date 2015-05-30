<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form CheckboxGroup Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class CheckboxGroupTest extends PHPUnit
{    
    
    public function testRender()
    {
        $checkboxGroup = new CheckboxGroup('test', [
            'items' => ['horror'  => 'Horror', 'drama'   => 'Drama'], 
            'value' => 'drama'
        ]);
        
        $expected = '<div id="form_test" class="checkbox-group">'
                  . '<div class="checkbox"><label>'
                  . '<input id="form_test_horror" name="test[]" value="horror" type="checkbox" /> Horror' 
                  . '</label></div>'
                  . '<div class="checkbox"><label>'
                  . '<input id="form_test_drama" name="test[]" value="drama" type="checkbox" checked /> Drama' 
                  . '</label></div>'
                  . '</div>';
        
        $this->assertEquals($expected, $checkboxGroup->render());
    }
    
    public function testAddItem()
    {
        $checkboxGroup = new CheckboxGroup('test');
        $checkboxGroup->setItems(['horror'  => 'Horror', 'drama'   => 'Drama']);
        $checkboxGroup->addItem('Fiction');
        
        $expected = '<div id="form_test" class="checkbox-group">'
                  . '<div class="checkbox"><label>'
                  . '<input id="form_test_horror" name="test[]" value="horror" type="checkbox" /> Horror' 
                  . '</label></div>'
                  . '<div class="checkbox"><label>'
                  . '<input id="form_test_drama" name="test[]" value="drama" type="checkbox" /> Drama' 
                  . '</label></div>'
                  . '<div class="checkbox"><label>'
                  . '<input id="form_test_fiction" name="test[]" value="Fiction" type="checkbox" /> Fiction' 
                  . '</label></div>'
                  . '</div>';
        
        $this->assertEquals($expected, $checkboxGroup->render());
    }
    
}
