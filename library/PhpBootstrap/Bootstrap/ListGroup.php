<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Ul;

/**
 * Bootstrap ListGroup
 * 
 * Creates an HTML unordered list
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ListGroup extends Component
{
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($items = null, $options = null)
    {
        parent::__construct(new Ul());
        if ($items) {
            $this->setItems($items);
        }
        if ($options) {
            $this->tag->setOptions($options);
        }
        $this->tag->addClass('list-group');
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
     * @return \PhpBootstrap\Bootstrap\ListGroup
     */
    public function addItem($content, $options = null)
    {
        $li = (($content instanceof Tag) && $content->getTag() == 'li')
            ? $content
            : $this->tag->createItem($content, $options);
        
        $li->addClass('list-group-item');
        
        $this->tag->addItem($li);
        return $this;
    }
    
}
