<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement,
    ArrayObject;

/**
 * Form Element RadioGroup
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class RadioGroup extends FormElement
{
    protected $tag = 'div';
    
    /**
     *
     * @var ArrayObject
     */
    protected $items;
    
    protected function init()
    {
        $this->items = new ArrayObject();
    }
    
    public function setItems(array $items)
    {
        foreach($items as $value => $label) {
            $this->addItem($label, $value);
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $label
     * @param mixed $value
     * @return \PhpBootstrap\Html\Form\Element\MultiRadio
     */
    public function addItem($label, $value = null)
    {
        if (!$value) {
            $value = $label;
        }
        
        $options = [
            'id'    => strtolower($this->getAttrib('id') . "_{$value}"),
            'label' => $label,
            'value' => $value
        ];
        $this->items->append(new Radio($this->getName(), $options));
        return $this;
    }
    
    public function render()
    {
        $this->setContent('');
        if ($this->items) {
            foreach($this->items as $item) {
                if ($item->getValue() == $this->getValue()) {
                    $item->check();
                }
                $this->append($item->render());
            }
        }
        $this->removeAttrib('name');
        $this->removeAttrib('value');
        $this->addClass('radio-group');
        
        return parent::render();
    }
}
