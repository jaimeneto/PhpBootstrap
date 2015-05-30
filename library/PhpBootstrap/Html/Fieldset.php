<?php

namespace PhpBootstrap\Html;

/**
 * Fieldset
 *
 * Creates an HTML fieldset
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Fieldset extends Tag
{
    protected $legend;
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($content = '', $options = null)
    {
        if (is_string($options)) {
            $options = ['legend' => $options];
        }
        if (!$content) {
            $content = '';
        }
        parent::__construct('fieldset', $content, $options);
    }
    
    public function legend($legend)
    {
        return $this->legend = $legend;;
    }

    public function render()
    {
        if ($this->legend) {
            $legend = new Tag('legend', $this->legend);
            $this->prepend($legend->render());
        }
        
        return parent::render();
    }
    
}
