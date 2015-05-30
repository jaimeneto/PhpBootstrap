<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component;
use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Panel
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Panel extends Component
{
    protected $panelStyleClasses = [
        'panel-default', 
        'panel-primary',
        'panel-success',
        'panel-info',
        'panel-warning',
        'panel-danger'
    ];

    protected $heading;
    protected $body;
    protected $footer;
    
    /**
     * 
     * @param mixed $body
     * @param mixed $options
     */
    public function __construct($body = null, $options = null)
    {
        $this->setBody($body);
        
        if ($options && is_string($options)) {
            $options = ['heading' => $options];
        }
        
        if (isset($options['heading'])) {
            $this->setHeading($options['heading']);
            unset($options['heading']);
        }
        
        if (isset($options['footer'])) {
            $this->setFooter($options['footer']);
            unset($options['footer']);
        }
        
        parent::__construct(new Tag('div', '', $options));
        
        $this->tag->addClass('panel');
        $this->tag->addClass('panel-default');
    }
    
    public function setHeading($content = null, $titleTag = null)
    {
        if ($titleTag) {
            $content = new Tag($titleTag, $content, ['class' => 'panel-title']);
        }
        
        if ($content) {
            $this->heading = new Tag('div', $content, ['class' => 'panel-heading']);
        }
        
        return $this;
    }
    
    public function setBody($content = null)
    {
        if ($content) {
            $this->body = new Tag('div', $content, ['class' => 'panel-body']);
        }
        
        return $this;
    }
    
    public function setFooter($content = null)
    {
        if ($content) {
            $this->footer = new Tag('div', $content, ['class' => 'panel-footer']);
        }
        
        return $this;
    }
    
    public function panelStyle($style = null)
    {
        $styleClass = "panel-{$style}";
        $this->removeClass($this->panelStyleClasses);
        if (in_array($styleClass, $this->panelStyleClasses)) {
            return $this->tag->addClass($styleClass);
        }
        return $this->tag->addClass('panel-default');
    }
    
    public function render()
    {
        if ($this->body !== null) {
            $this->prepend($this->body);
        }
        
        if ($this->heading !== null) {
            $this->prepend($this->heading);
        }
        
        if ($this->footer !== null) {
            $this->append($this->footer);
        }
                
        return parent::render();
    }
    
}
