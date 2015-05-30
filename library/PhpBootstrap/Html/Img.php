<?php

namespace PhpBootstrap\Html;

/**
 * Img
 *
 * Creates an HTML img
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Img extends Tag
{
    
    /**
     * 
     * @param string $src
     * @param mixed $options
     */
    public function __construct($src, $options = null)
    {
        $options['src'] = $src;
        parent::__construct('img', null, $options);
    }
    
    public function src($src)
    {
        return $this->setAttrib('src', $src);
    }
    
    public function alt($text)
    {
        return $this->setAttrib('alt', $text);
    }
    
    public function width($width)
    {
        return $this->setAttrib('width', $width);
    }
    
    public function height($height)
    {
        return $this->setAttrib('height', $height);
    }

    ################################ BOOTSTRAP ################################
    
    public function responsive()
    {
        return $this->addClass('img-responsive');
    }
    
    public function rounded()
    {
        $this->removeClass(['img-circle', 'img-thumbnail']);
        return $this->addClass('img-rounded');
    }
    
    public function circle()
    {
        $this->removeClass('img-rounded');
        return $this->addClass('img-circle');
    }
    
    public function thumbnail()
    {
        $this->removeClass('img-rounded');
        return $this->addClass('img-thumbnail');
    }
    
}
