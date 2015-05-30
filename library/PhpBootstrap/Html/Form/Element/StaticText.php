<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Static Text
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class StaticText extends FormElement
{
    protected $tag = 'p';

    protected function init()
    {
        $this->addClass('form-control-static');
    }
    
    public function render()
    {
        $this->setName('');
        $this->setContent($this->getValue());
        $this->setValue('');
        return parent::render();
    }
    
}
