<?php

namespace PhpBootstrap\Html\Form;

use PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Abstract Form Decorator
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
abstract class Decorator extends Tag
{
    const PLACEMENT_BEFORE = 'before';
    const PLACEMENT_AFTER  = 'after';
    const PLACEMENT_WRAP   = 'wrap';
    
    /**
     *
     * @var string
     */
    protected $placement = self::PLACEMENT_BEFORE;
    
    /**
     *
     * @var \PhpBootstrap\Html\Form\Element
     */
    protected $element;
    
    /**
     * 
     * @param \PhpBootstrap\Html\Form\Element $element
     */
    public function setElement(FormElement &$element) 
    {
        $this->element = $element;
        return $this;
    }

    /**
     * 
     * @param string $placement
     * @return \PhpBootstrap\Html\Form\Decorator
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getPlacement()
    {
        return $this->placement;
    }
    
    public function renderPartial()
    {
        $content = $this->getContent() 
                 ? $this->getContent()
                 : $this->element->renderPartial();
        
        $this->setContent('');
        
        switch($this->placement) {
            case self::PLACEMENT_AFTER:
                return $content . parent::render();
            case self::PLACEMENT_WRAP:
                $this->setContent($content);
                return parent::render();
            case self::PLACEMENT_BEFORE:
            default:
                return parent::render() . $content;
        }
    }
    
}
