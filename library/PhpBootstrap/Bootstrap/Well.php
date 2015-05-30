<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Well
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Well extends Tag
{
    /**
     * 
     * @param string $content
     * @param array $options
     */
    public function __construct($content = '', $options = null)
    {
        $size = null;
        if ($options && is_string($options)) {
            $size = $options;
            $options = [];
        }
        
        if (isset($options['size'])) {
            $size = $options['size'];
            unset($options['size']);
        }
        
        parent::__construct('div', $content, $options);
        $this->addClass('well');
        $this->size($size);
    }
    
    /**
     * 
     * @param string $size lg|sm
     * @return Well
     */
    public function size($size)
    {
        $sizes = ['well-lg', 'well-sm'];
        $this->removeClass($sizes);
        $sizeClass = "well-{$size}";
        if (in_array($sizeClass, $sizes)) {
            $this->addClass($sizeClass);
        }
        return $this;
    }
    
    /**
     * 
     * @return Well
     */
    public function large()
    {
        return $this->size('lg');
    }
    
    /**
     * 
     * @return Well
     */
    public function small()
    {
        return $this->size('sm');
    }
    
    public function render()
    {
        $this->addClass('well');
        return parent::render();
    }
    
}
