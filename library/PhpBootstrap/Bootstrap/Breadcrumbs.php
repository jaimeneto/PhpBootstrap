<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Ol,
    PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Link;

/**
 * Bootstrap Breadcrumbs
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Breadcrumbs extends Component
{    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($items = null, $options = null)
    {
        parent::__construct(new Ol());
        if ($items) {
            $this->setItems($items);
        }
        if ($options) {
            $this->tag->setOptions($options);
        }
        $this->tag->addClass('breadcrumb');
    }
    
    public function setItems(array $items)
    {
        foreach($items as $k => $v) {
            if (is_numeric($k)) {
                $this->addItem($v);
            } else {
                $this->addItem($k, ['href' => $v]);
            }
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \Bootstrap\Ol
     */
    public function addItem($content, $options = null)
    {
        $li = (($content instanceof Tag) && $content->getTag() == 'li')
            ? $content
            : $this->createItem($content, $options);
        
        $this->tag->addItem($li);
        return $this;
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Component
     */
    public function createItem($content, $options = null)
    {
        if (is_array($content)) {
            $options = $content;
            $content = isset($options['content']) ? $options['content'] : '';
        }
        
        $href = isset($options['href']) ? $options['href'] : '#';
        unset($options['href']);
        
        $active = isset($options['active']) && $options['active'];
        unset($options['active']);
        
        $link = $active ? $content : new Link($content, $href);
        
        $li = new Tag('li', $link, $options);
        
        if ($active) {
            $li->addClass('active');
        }
        
        return $li;
    }

}
