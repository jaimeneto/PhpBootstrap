<?php

namespace PhpBootstrap\Html\Form;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit,
    PhpBootstrap\Html\Form\Element\Text;

/**
 * Form Element Test
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ElementTest extends PHPUnit
{
    
    public function testSetReadOnly()
    {
        $element = new Text('test');
        $element->readOnly();
        $this->assertTrue($element->getAttrib('readonly'));
        
        $element->readOnly(false);
        $this->assertFalse($element->getAttrib('readonly'));
    }
    
    public function testSetDisabled()
    {
        $element = new Text('test');
        $element->disabled();
        $this->assertTrue($element->getAttrib('disabled'));
        
        $element->disabled(false);
        $this->assertFalse($element->getAttrib('disabled'));
    }
    
    public function testSetValidationState()
    {
        $element = new Text('test');
        $element->addDecorator('wrapper', ['name'  => 'formgroup', 'class' => 'form-group']);
        
        $element->hasSuccess();
        $this->assertTrue($element->getDecorator('formgroup')->hasClass('has-success'));
        
        $element->hasWarning();
        $this->assertFalse($element->getDecorator('formgroup')->hasClass('has-success'));
        $this->assertTrue($element->getDecorator('formgroup')->hasClass('has-warning'));
        
        $element->hasError();
        $this->assertFalse($element->getDecorator('formgroup')->hasClass('has-warning'));
        $this->assertTrue($element->getDecorator('formgroup')->hasClass('has-error'));
    }
    
    public function testSetSize()
    {
        $element = new Text('test');
        $element->large();
        $this->assertTrue($element->hasClass('input-lg'));
        
        $element->small();
        $this->assertFalse($element->hasClass('input-lg'));
        $this->assertTrue($element->hasClass('input-sm'));
        
        $element->size('other');
        $this->assertFalse($element->hasClass('input-sm'));
    }
    
    public function testSetGroupSize()
    {
        $element = new Text('test');
        $element->addDecorator('wrapper', ['name'  => 'formgroup', 'class' => 'form-group']);
        
        $element->groupLarge();
        $this->assertTrue($element->getDecorator('formgroup')->hasClass('form-group-lg'));
        
        $element->groupSmall();
        $this->assertFalse($element->getDecorator('formgroup')->hasClass('form-group-lg'));
        $this->assertTrue($element->getDecorator('formgroup')->hasClass('form-group-sm'));
        
        $element->groupSize('other');
        $this->assertFalse($element->getDecorator('formgroup')->hasClass('form-group-sm'));
    }
    
    public function testSetAndGetHelp()
    {
        $element = new Text('test');
        $help = 'this is a help text';
        $element->setHelp($help);
        $this->assertEquals($help, $element->getHelp());
    }
    
}
