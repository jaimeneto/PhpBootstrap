<?php

namespace PhpBootstrap\Html\Form\Decorator;

use PhpBootstrap\Html\Form\Decorator as FormDecorator;

/**
 * Label Decorator
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Label extends FormDecorator
{
    const PLACEMENT_PREPEND = 'prepend';
    const PLACEMENT_APPEND  = 'append';
    
    protected $placement = self::PLACEMENT_BEFORE;
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        parent::__construct('label', $content, $options);
    }
    
    public function setElement(\PhpBootstrap\Html\Form\Element &$element)
    {
        parent::setElement($element);
        $this->setFor($element->getAttrib('id'));
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getFor()
    {
        return $this->getAttrib('for');
    }
    
    /**
     * 
     * @param string $elementId
     */
    public function setFor($elementId)
    {
        return $this->setAttrib('for', $elementId);
    }
    
    public function render()
    {
        $content = $this->getContent() 
                 ? $this->getContent()
                 : $this->element->renderPartial();
        
        $this->setContent('');
        
        switch($this->placement) {
            case self::PLACEMENT_AFTER:
                $this->setContent($this->element->getLabel());
                $html = $content . parent::render();
                break;
            case self::PLACEMENT_WRAP:
                $this->setContent($content);
                $html = parent::render();
                break;
            case self::PLACEMENT_APPEND:    
                $this->setContent($this->element->getLabel() . ' ' . $content);
                $html = parent::render();
                break;
            case self::PLACEMENT_PREPEND:    
                $this->setContent($content . ' ' . $this->element->getLabel());
                $html = parent::render();
                break;
            case self::PLACEMENT_BEFORE:
            default:
                $this->setContent($this->element->getLabel());
                $html = parent::render() . $content;
        }
        
        return $html;
    }
    
}
