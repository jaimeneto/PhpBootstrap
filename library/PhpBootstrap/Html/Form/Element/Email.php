<?php

namespace PhpBootstrap\Html\Form\Element;

/**
 * Form Element Email
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Email extends Text
{
    protected function init()
    {
        parent::init();
        $this->setAttrib('type', 'email');
    }
    
}
