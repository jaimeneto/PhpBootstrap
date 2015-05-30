<?php

namespace PhpBootstrap\Html;

use ArrayObject;

/**
 * Ol
 * 
 * Creates an HTML ordered list
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Ol extends Tag
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
        
        parent::__construct('ol', '', $options);
    }
    
    public function setItems(array $items)
    {
        foreach($items as $item) {
            $this->addItem($item);
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Tag
     */
    public function createItem($content, $options = null)
    {
        if (is_array($content)) {
            $options = $content;
            $content = isset($options['content']) ? $options['content'] : '';
        }
        
        return new Tag('li', $content, $options);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Ol
     */
    public function addItem($content, $options = null)
    {
        $li = (($content instanceof Tag) && $content->getTag() == 'li')
            ? $content
            : $this->createItem($content, $options);
        
        $this->items->append($li);
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
        if ($this->items) {
            foreach($this->items as $item) {
                $this->append($item->render());
            }
        }
        
        return parent::render();
    }
    
}
