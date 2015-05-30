<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Checkbox
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Checkbox extends FormElement
{
    protected $tag = 'input';
    protected $close = false;
    protected $insertHiddenUncheckedValue = true;

    protected function init()
    {
        $this->setAttrib('type', 'checkbox');
        $this->setValue('1');
    }
    
    public function insertHiddenUncheckedValue($bool = true)
    {
        $this->insertHiddenUncheckedValue = (bool) $bool;
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
                ? $this->addClass('checkbox-inline')
                : $this->removeClass('checkbox-inline');
    }
    
    public function renderPartial()
    {
        $this->setAttrib('type', 'checkbox');
        $hidden = $this->insertHiddenUncheckedValue 
                ? new Hidden($this->getName(), ['value' => 0, 'id' => ''])
                : '';
        $disabled = $this->getAttrib('disabled') ? ' disabled' : '';
        
        $divClass = 'checkbox';
        if ($this->hasClass('checkbox-inline')) {
            $divClass .= '-inline';
            $this->removeClass('checkbox-inline');
        }
        
        $html = '<div class="' . $divClass . $disabled . '"><label>' 
              . $hidden
              . parent::renderPartial() . ' ' . $this->getLabel()
              . '</label></div>';
                
        return $html;
    }
    
}
