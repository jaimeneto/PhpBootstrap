<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element Textarea
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Textarea extends FormElement
{
    protected $tag = 'textarea';

    protected function init()
    {
        $this->addClass('form-control');
    }
           
    /**
     * 
     * @param integer $rows
     * @return \PhpBootstrap\Html\Form\Element\Textarea
     */
    public function rows($rows)
    {
        return $this->setAttrib('rows', (int) $rows);
    }
    
    public function renderPartial()
    {
        if ($this->getContent() === null) {
            $this->setContent('');
        }
        return parent::renderPartial();
    }
    
}
