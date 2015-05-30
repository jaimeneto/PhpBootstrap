<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;

/**
 * Bootstrap ProgressBar
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ProgressBar extends Tag
{
    protected $progressBarStyleClasses = [
        'progress-bar-success',
        'progress-bar-info',
        'progress-bar-warning',
        'progress-bar-danger'
    ];
    
    /**
     * 
     * @param int  $value
     * @param mixed $options
     */
    public function __construct($value = 0, $options = null)
    {
        $content = '';
        if ($options && is_string($options)) {
            $content = $options;
            $options = [];
        }
        
        $options['role'] = 'progressbar';
        
        $options['value'] = $value;
        
        if (!isset($options['min'])) {
            $options['min'] = 0;
        }
               
        if (!isset($options['max'])) {
            $options['max'] = 100;
        }
        
        parent::__construct('div', $content, $options);
        $this->addClass('progress-bar');
    }
    
    public function setValue($value)
    {
        $value = (int) $value;
        $this->aria('valuenow', $value);
        $this->setStyle('width', "{$value}%");
    }
    
    public function setMin($value)
    {
        $this->aria('valuemin', (int) $value);
    }
    
    public function setMax($value)
    {
        $this->aria('valuemax', (int) $value);
    }
    
    /**
     * 
     * @param string $style
     * @return ProgressBar
     */
    public function progressBarStyle($style = null)
    {
        $styleClass = "progress-bar-{$style}";
        $this->removeClass($this->progressBarStyleClasses);
        if (in_array($styleClass, $this->progressBarStyleClasses)) {
            return $this->addClass($styleClass);
        }
    }
    
    public function render()
    {
        $this->addClass('progress-bar');        
        $wrapper = new Tag('div', parent::render(), ['class' => 'progress']);
        
        return $wrapper->render();
    }
    
}
