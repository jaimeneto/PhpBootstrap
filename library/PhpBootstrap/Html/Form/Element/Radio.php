<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Radio
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Radio extends FormElement
{
    protected $tag = 'input';
    protected $close = false;

    protected function init()
    {
        $this->setAttrib('type', 'radio');
        $this->setValue('1');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element\Checkbox
     */
    public function setChecked($bool = true)
    {
        return $this->setAttrib('checked', (bool) $bool);
    }
    
    public function check()
    {
        return $this->setChecked(true);
    }
    
    public function uncheck()
    {
        return $this->setChecked(false);
    }
    
    /**
     * 
     * @return boolean
     */
    public function isChecked()
    {
        return (bool) $this->getAttrib('checked');
    }
    
    public function inline($bool = true)
    {
        return $bool
                ? $this->addClass('radio-inline')
                : $this->removeClass('radio-inline');
    }
    
    public function renderPartial()
    {
        $this->setAttrib('type', 'radio');
        $disabled = $this->getAttrib('disabled') ? ' disabled' : '';
        
        $divClass = 'radio';
        if ($this->hasClass('radio-inline')) {
            $divClass .= '-inline';
            $this->removeClass('radio-inline');
        }
        
        $html = '<div class="' . $divClass . $disabled . '"><label>' 
              . parent::renderPartial() . ' ' . $this->getLabel()
              . '</label></div>';
                
        return $html;
    }
    
}
