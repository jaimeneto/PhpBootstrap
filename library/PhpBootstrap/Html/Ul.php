<?php

namespace PhpBootstrap\Html;

/**
 * Ul
 * 
 * Creates an HTML unordered list
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Ul extends Ol
{
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($items = null, $options = null)
    {
        parent::__construct($items, $options);
        $this->setTag('ul');
    }

    ################################ BOOTSTRAP ################################
    
    public function unstyled()
    {
        $this->removeClass('list-unstyled');
        return $this->addClass('list-unstyled');
    }
    
    public function inline()
    {
        $this->removeClass('list-unstyled');
        return $this->addClass('list-inline');
    }
    
}
