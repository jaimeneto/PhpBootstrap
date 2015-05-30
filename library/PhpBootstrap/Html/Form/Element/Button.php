<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Button
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Button extends FormElement
{
    protected $tag = 'button';
    
    protected function init()
    {
        $this->type('button');
        $this->addClass('btn');
    }
    
    public function input()
    {
        return $this->setTag('input');
    }
    
    public function type($type)
    {
        $types = ['button', 'submit', 'reset'];
        
        if (!in_array($type, $types)) {
            $type = 'button';
        }
        
        return $this->setAttrib('type', $type);
    }
    
    public function btnClass($class)
    {
        $btnClasses = [
            'btn-default',
            'btn-primary',
            'btn-success',
            'btn-info',
            'btn-warning',
            'btn-danger',
            'btn-link'
        ];
        
        $btnClass = "btn-{$class}";
        $this->removeClass($btnClasses);
        if (in_array($btnClass, $btnClasses)) {
            return $this->addClass($btnClass);
        }
    }
    
    public function size($size)
    {
        $sizes = ['btn-lg', 'btn-sm', 'btn-xs'];
        
        $sizeClass = "btn-{$size}";
        $this->removeClass($sizes);
        if (in_array($sizeClass, $sizes)) {
            return $this->addClass($sizeClass);
        }
    }
    
    public function extraSmall()
    {
        return $this->size('xs');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element\Button
     */
    public function blockLevel($bool = true)
    {
        return $bool 
                ? $this->addClass('btn-block') 
                : $this->removeClass('btn-block');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element\Button
     */
    public function active($bool = true)
    {
        return $bool 
                ? $this->addClass('active') 
                : $this->removeClass('active');
    }
    
    public function render()
    {
        if ($this->getTag() == 'button') {
            $this->setContent($this->getLabel());
        } elseif ($this->getTag() == 'input') {
            $this->setValue($this->getLabel());
        }
        $this->setLabel(null);
                
        return parent::render();
    }
    
}
