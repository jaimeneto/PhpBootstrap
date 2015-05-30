<?php

namespace PhpBootstrap\Html;

use ArrayObject;

/**
 * Dl
 * 
 * Creates an HTML description list
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Dl extends Tag
{
    /**
     *
     * @var ArrayObject
     */
    protected $items;
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($items = null, $options = null)
    {
        $this->items = new ArrayObject();
        
        if ($items) {
            $options['items'] = $items;
        }
        
        parent::__construct('dl', '', $options);
    }
    
    public function setItems(array $items)
    {
        foreach($items as $dt => $dd) {
            $this->addItem($dt, $dd);
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $dtContent
     * @param mixed $ddContent
     * @param array  $options
     * @return \PhpBootstrap\HtmlList
     */
    public function addItem($dtContent, $ddContent, array $options = null)
    {
        $dtOptions = $ddOptions = null;
        
        if (is_array($dtContent)) {
            $dtOptions = $dtContent;
            $dtContent = isset($dtOptions['content']) ? $dtOptions['content'] : '';
        }
        
        if (is_array($ddContent)) {
            $ddOptions = $ddContent;
            $ddContent = isset($ddOptions['content']) ? $ddOptions['content'] : '';
        }
        
        if (isset($options['dt'])) {
            $dtOptions = $options['dt'];
            unset($options['dt']);
        }
        
        if (isset($options['dd'])) {
            $ddOptions = $options['dd'];
            unset($options['dd']);
        } elseif (!$ddOptions) {
            $ddOptions = $options;
        }

        $dt = new Tag('dt', $dtContent, $dtOptions);
        $dd = new Tag('dd', $ddContent, $ddOptions);
        $this->items->append(['dt' => $dt, 'dd' => $dd]);
        return $this;
    }

    /**
     * 
     * @return ArrayObject
     */
    public function getItems()
    {
        return $this->items;
    }
    
    public function render()
    {
        foreach($this->items as $item) {
            $this->append($item['dt']);
            $this->append($item['dd']);
        }
        
        return parent::render();
    }
    
}
