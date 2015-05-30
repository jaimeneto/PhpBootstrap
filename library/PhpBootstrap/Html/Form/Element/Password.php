<?php

namespace PhpBootstrap\Html\Form\Element;

/**
 * Form Element Password
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Password extends Text
{
    protected function init()
    {
        parent::init();
        $this->setAttrib('type', 'password');
    }
    
}
