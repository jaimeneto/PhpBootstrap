<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Ul,
    PhpBootstrap\Html\Link;

/**
 * Bootstrap Nav
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Nav extends Component
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
        $this->tag->addClass('nav');
    }
    
    public function navJustified()
    {
        $this->tag->removeClass('nav-stacked');
        $this->tag->addClass('nav-justified');
        return $this;
    }
    
    public function navStacked()
    {
        $this->tag->removeClass('nav-justified');
        $this->tag->addClass('nav-stacked');
        return $this;
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
     * @return \PhpBootstrap\Html\Tag
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
        
        $disabled = isset($options['disabled']) && $options['disabled'];
        unset($options['disabled']);
        
        $link = new Link($content, $href);
        
        $li = new Tag('li', $link, $options);
        
        if ($active) {
            $li->addClass('active');
        }
        
        if ($disabled) {
            $li->addClass('disabled');
        }
        
        return $li;
    }

}
