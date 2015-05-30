<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement,
    PhpBootstrap\Html\Tag;

/**
 * Form Element Select
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Select extends FormElement
{
    protected $tag = 'select';
    
    /**
     *
     * @var array
     */
    protected $items;
    
    protected function init()
    {
        $this->addClass('form-control');
    }          
    
    public function setItems(array $items)
    {
        $this->items = $items;
    }
    
    public function multiple($bool = true)
    {
        return $this->setAttrib('multiple', $bool);
    }
    
    /**
     * 
     * @param string $label
     * @param array $items
     * @return string
     */
    protected function renderOptGroup($label, array $items)
    {
        $optgroup = new Tag('optgroup', '', ['label' => $label]);
        foreach($items as $key => $value) {
            $optgroup->append($this->renderItem($key, $value));
        }        
        return $optgroup->render();
    }
    
    /**
     * 
     * @param string $value
     * @param string $label
     * @return string
     */
    protected function renderItem($value, $label)
    {
        $options = [
            'value'    => $value,
            'selected' => in_array($value, (array) $this->getValue())
        ];
        $item = new Tag('option', $label, $options);
        return $item->render();
    }
    
    public function render()
    {
        if ($this->items) {
            foreach($this->items as $key => $value) {
                if (is_array($value)) {
                    $this->append($this->renderOptGroup($key, $value));
                } else {
                    $this->append($this->renderItem($key, $value));
                }
            }
        }
        $this->removeAttrib('value');
        
        return parent::render();
    }
}
