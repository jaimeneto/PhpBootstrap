<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component;
use PhpBootstrap\Html\Tag;

/**
 * Bootstrap PageHeader
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class PageHeader extends Component
{
    protected $h1;

    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content, $options = null)
    {
        $smallContent = null;        
        if ($options && is_string($options)) {
            $smallContent = $options;
            $options = [];
        }
        
        if (isset($options['smallContent'])) {
            $smallContent = $options['smallContent'];
            unset($options['smallContent']);
        }
        
        $this->setH1Content($content, $smallContent);
        parent::__construct(new Tag('div', '', $options));
        
        $this->tag->addClass('page-header');
    }
    
    public function setH1Content($h1Content, $smallContent = null)
    {
        $this->h1 = new Tag('h1', $h1Content);
        
        if ($smallContent) {
            $small = new Tag('small', $smallContent);
            
            $this->h1->append($small, ' ');
        }
        
        return $this;
    }
    
    public function render()
    {
        $this->tag->prepend($this->h1);
        return parent::render();
    }
    
}
