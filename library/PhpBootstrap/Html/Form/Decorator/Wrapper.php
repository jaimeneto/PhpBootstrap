<?php

namespace PhpBootstrap\Html\Form\Decorator;

use PhpBootstrap\Html\Form\Decorator as FormDecorator;

/**
 * Wrapper Decorator
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Wrapper extends FormDecorator
{
    protected $placement = self::PLACEMENT_WRAP;
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        parent::__construct('div', $content, $options);
    }
    
    public function render()
    {
        return $this->renderPartial();
    }
    
}
