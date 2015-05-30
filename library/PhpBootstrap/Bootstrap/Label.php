<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Label
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Label extends Tag
{
    protected $labelStyleClasses = [
        'label-default',
        'label-primary',
        'label-success',
        'label-info',
        'label-warning',
        'label-danger'
    ];
   
    /**
     * 
     * @param string $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        $labelStyle = null;
        if ($options && is_string($options)) {
            $labelStyle = $options;
            $options = [];
        }
        
        $options['role'] = 'label';
                
        parent::__construct('span', $content, $options);
        
        $this->addClass('label');
        $this->labelStyle($labelStyle);
    }
    
    /**
     * 
     * @param string $style
     * @return Label
     */
    public function labelStyle($style = null)
    {
        $styleClass = "label-{$style}";
        $this->removeClass($this->labelStyleClasses);
        if (in_array($styleClass, $this->labelStyleClasses)) {
            return $this->addClass($styleClass);
        }
    }
    
    public function render()
    {
        $this->addClass('label');
        return parent::render();
    }
    
}
