<?php

namespace PhpBootstrap\Html\Form\Element;

use PhpBootstrap\Html\Form\Element as FormElement;

/**
 * Form Element File
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class File extends FormElement
{
    protected $tag = 'input';
    
    /**
     *
     * @var array
     */
    protected $accept;
    
    protected function init()
    {
        $this->setAttrib('type', 'file');
    }          
    
    public function setAccept($filetype)
    {
        $this->removeAttrib('accept');
        if (is_array($filetype)) {
            foreach($filetype as $ft) {
                $this->addAccept($ft);
            }
        } else {
            $this->addAccept($filetype);
        }
        return $this;
    }
    
    public function addAccept($filetype)
    {
        if (!isset($this->attribs['accept'])) {
            $this->attribs['accept'] = trim($filetype);
        } else {
            $accept = explode(',', $this->attribs['accept']);
            $accept[] = $filetype;
            $accept = array_unique($accept);
            $this->attribs['accept'] = implode(',',$accept);
        }
        return $this;
    }
    
}
