<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Group
 *
 * Creates an HTML form element
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Group extends FormElement
{
    protected $tag = 'div';
    
    /**
     * List of \PhpBootstrap\Html\Form\Element
     * 
     * @var ArrayObject
     */
    protected $elements;
    
    protected $clearElementsDecorators = false;
    
    /**
     * 
     * @param \PhpBootstrap\Html\Form\Element $element
     * @return \PhpBootstrap\Html\Form
     */
    public function addElement(FormElement $element)
    {
        if ($element instanceof Group) {
            throw new \InvalidArgumentException(
                    'You can not add a group to another group');
        }
        
        if ($this->clearElementsDecorators) {
            $element->clearDecorators();
        }
        
        $this->elements[$element->getName()] = $element;
        return $this;
    }
    
    /**
     * 
     * @param type $bool
     * @return \PhpBootstrap\Html\Form\Element\Group
     */
    public function setClearElementsDecorators($bool = true)
    {
        $this->clearElementsDecorators = (bool) $bool;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function render()
    {
        if ($this->elements) {
            foreach($this->elements as $element) {
                $this->append($element->render(), 
                              $this->getContent() ? ' ' : '');
            }
        }
        $this->setName('');
        
        return parent::render();
    }
    
}
