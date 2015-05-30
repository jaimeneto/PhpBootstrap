<?php

namespace PhpBootstrap\Bootstrap;

/**
 * Bootstrap Piils
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Pills extends Nav
{    
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($items = null, $options = null)
    {
        parent::__construct($items, $options);
        $this->addClass('nav-pills');
    }
        
    public function createItem($content, $options = null)
    {
        $li = parent::createItem($content, $options);
        $li->setAttrib('role', 'presentation');
        
        return $li;
    }
    
}
