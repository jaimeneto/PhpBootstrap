<?php

namespace PhpBootstrap\Html\Form\Decorator;

use PhpBootstrap\Html\Form\Decorator as FormDecorator,
    PhpBootstrap\Html\Tag;

/**
 * Wrapper Decorator
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class InputGroup extends FormDecorator
{
    protected $placement = self::PLACEMENT_WRAP;
    
    protected $prependAddon;
    protected $appendAddon;
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        parent::__construct('div', $content, $options);
        $this->addClass('input-group');
    }
    
    public function appendAddon($content)
    {
        $this->appendAddon = 
                new Tag('span', $content, ['class' => 'input-group-addon']);
        return $this;
    }
    
    public function prependAddon($content)
    {
        $this->prependAddon = 
                new Tag('span', $content, ['class' => 'input-group-addon']);
        return $this;
    }
            
    public function render()
    {
        $this->setContent($this->element->renderPartial());
        
        if ($this->prependAddon) {
            $this->prepend($this->prependAddon->render());
        }
        if ($this->appendAddon) {
            $this->append($this->appendAddon->render());
        }
        
        return parent::render();
    }
    
}
