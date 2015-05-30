<?php

namespace PhpBootstrap\Html;

/**
 * Link
 *
 * Creates an HTML anchor
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Link extends Tag
{
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        if (is_string($options)) {
            $options = ['href' => $options];
        }
        if ($content === null) {
            $content = '';
        }
        parent::__construct('a', $content, $options);
    }
    
    public function href($url)
    {
        return $this->setAttrib('href', $url);
    }
    
        
    public function target($target)
    {
        return $this->setAttrib('target', $target);
    }
    
}
