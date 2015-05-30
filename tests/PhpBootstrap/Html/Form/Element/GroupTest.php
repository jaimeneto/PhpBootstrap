<?php

namespace PhpBootstrap\Html\Form\Element;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Form Element Group Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class GroupTest extends PHPUnit
{    
    
    public function testRender()
    {
        $group = new Group('test');
        $group->addElement(new Button('save', ['label' => 'Save']));
        $group->addElement(new Button('cancel', ['label' => 'Cancel']));
        $expected = '<div id="form_test">'
                  . '<button id="form_save" class="btn" name="save" type="button">Save</button> '
                  . '<button id="form_cancel" class="btn" name="cancel" type="button">Cancel</button>'
                  . '</div>';
        
        $this->assertEquals($expected, $group->render());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddGroupElement()
    {
        $group = new Group('test');
        $group->addElement(new Group('test2'));
    }
    
}
