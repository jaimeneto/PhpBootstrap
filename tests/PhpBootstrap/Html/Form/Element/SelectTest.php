<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Select Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class SelectTest extends PHPUnit
{
    
    public function testElementHasFormControlClass()
    {
        $select = new Select('test');
        $this->assertTrue($select->hasClass('form-control'));
    }
    
    public function testSetMultiple() 
    {
        $select = new Select('test');
        $select->multiple();
        $this->assertTrue($select->getAttrib('multiple'));
    }
    
    public function testSetItems()
    {
        $select = new Select('test', ['items' => ['No', 'Yes']]);
        $select->setValue(1);
        $expected = '<select id="form_test" class="form-control" name="test">' 
                  . '<option value="0">No</option>'
                  . '<option value="1" selected>Yes</option>'
                  . '</select>';
        $this->assertEquals($expected, $select->render());
    }
    
    public function testSetItemsWithOptGroup()
    {
        $select = new Select('test');
        $select->multiple()->setValue(['y', 's']);
        $select->setItems([
            'Group 1' => ['n' => 'No', 'y' => 'Yes'],
            'Group 2' => ['s' => 'Sure', 'w' => 'Whatever'],
        ]);
        $expected = '<select id="form_test" class="form-control" name="test" multiple>' 
                  . '<optgroup label="Group 1">'
                  . '<option value="n">No</option>'
                  . '<option value="y" selected>Yes</option>'
                  . '</optgroup>'
                  . '<optgroup label="Group 2">'
                  . '<option value="s" selected>Sure</option>'
                  . '<option value="w">Whatever</option>'
                  . '</optgroup>'
                  . '</select>';
        $this->assertEquals($expected, $select->render());
    }
    
}
