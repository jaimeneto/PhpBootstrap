<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Hidden
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Hidden extends FormElement
{
    protected $tag = 'input';

    protected function init()
    {
        $this->setAttrib('type', 'hidden');
    }
    
}
