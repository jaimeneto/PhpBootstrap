<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Text
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Text extends FormElement
{
    protected $tag = 'input';
    
    protected function init()
    {
        $this->setAttrib('type', 'text');
        $this->addClass('form-control');
    }          
    
}
