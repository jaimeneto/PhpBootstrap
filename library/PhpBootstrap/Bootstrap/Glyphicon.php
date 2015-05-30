<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Icon
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Glyphicon extends Tag
{
    /**
     * 
     * @param string $icon
     * @param mixed  $options
     */
    public function __construct($icon, $options = null)
    {
        parent::__construct('span', '', $options);
        $this->addClass('glyphicon');
        $this->setIcon($icon);
    }
    
    public function setIcon($icon)
    {
        $classes = $this->getClass();
        foreach($classes as $class) {
            if (strstr($class, 'glyphicon-')) {
                $this->removeClass($class);
            }
        }
        
        $iconName = str_replace('glyphicon-', '', $icon);
        return $this->addClass("glyphicon-{$iconName}");
    }
    
}
