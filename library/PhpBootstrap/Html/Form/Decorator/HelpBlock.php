<?php

namespace PhpBootstrap\Html\Form\Decorator;

use PhpBootstrap\Html\Form\Decorator as FormDecorator;

/**
 * HelpBlock Decorator
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class HelpBlock extends FormDecorator
{
    protected $placement = self::PLACEMENT_AFTER;
    
    /**
     * 
     * @param string $content
     * @param array $options
     */
    public function __construct($content = '', $options = null)
    {
        if (is_array($content)) {
            $options = $content;
            $content = '';
        }
        
        parent::__construct('span', $content, $options);
        $this->addClass('help-block');
    }
    
    public function render()
    {        
        $content = $this->element->renderPartial();
        
        if ($this->element->getHelp()) {
            $this->setContent($this->element->getHelp());
        }
        
        switch($this->placement) {
            case self::PLACEMENT_BEFORE:
                $html = parent::render() . $content;
                break;
            default:
            case self::PLACEMENT_AFTER:
                $html = $content . parent::render();
        }
        
        return $html;
    }
    
}
