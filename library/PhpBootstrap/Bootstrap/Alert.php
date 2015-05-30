<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component;
use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Alert
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Alert extends Component
{
    protected $alertStyleClasses = [
        'alert-success',
        'alert-info',
        'alert-warning',
        'alert-danger'
    ];
   
    protected $ariaLabel;
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        $alertStyle = null;
        if ($options && is_string($options)) {
            $alertStyle = $options;
            $options = [];
        }
        
        $dismissible = false;
        if (isset($options['dismissible']) && $options['dismissible']) {
            $dismissible = $options['dismissible'];
            unset($options['dismissible']);
        }
        
        $options['role'] = 'alert';

        parent::__construct(new Tag('div', $content, $options));
        
        $this->tag->addClass('alert');
        $this->alertStyle($alertStyle);
        if ($dismissible) {
            $this->dismissible($dismissible);
        }
    }
    
    /**
     * 
     * @param string $style
     * @return Alert
     */
    public function alertStyle($style = null)
    {
        $styleClass = "alert-{$style}";
        $this->tag->removeClass($this->alertStyleClasses);
        if (in_array($styleClass, $this->alertStyleClasses)) {
            return $this->tag->addClass($styleClass);
        }
    }
    
    /**
     * 
     * @param mixed $ariaLabel
     * @return Alert
     */
    public function dismissible($ariaLabel = null)
    {
        if (is_string($ariaLabel)) {
            $this->ariaLabel = $ariaLabel ?: 'Close';
        }
        return $ariaLabel === false
                ? $this->tag->removeClass('alert-dismissible')
                : $this->tag->addClass('alert-dismissible');
    }
    
    public function render()
    {
        if ($this->hasClass('alert-dismissible')) {
            $ariaLabelAttrib = $this->ariaLabel 
                             ? ' aria-label="' . $this->ariaLabel . '"'
                             : '';
            
            $this->prepend('<button type="button" class="close" ' 
                . 'data-dismiss="alert"' . $ariaLabelAttrib . '>' 
                . '<span aria-hidden="true">&times;</span></button>');
        }
        
        return parent::render();
    }
    
}
