<?php

namespace PhpBootstrap;

use PhpBootstrap\Bootstrap\Component;

/**
 * Bootstrap Factory
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
final class Bootstrap
{    
    /**
     *
     * @var \PhpBootstrap\Html
     */
    private $html;
    
    public function __construct()
    {
        $this->html = new Html();
    }
    
    public function __call($name, $arguments)
    {
        $tag = call_user_func_array([$this->html, $name], $arguments);
        return new Component($tag);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Alert
     */
    public function alert($content = '', $options = null)
    {
        return new Bootstrap\Alert($content, $options);
    }
    
    /**
     * 
     * @param string $content
     * @return \PhpBootstrap\Html\Tag
     */
    public function badge($content = null)
    {
        return $this->span($content, ['class' => 'badge']);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Label
     */
    public function label($content = '', $options = null)
    {
        return new Bootstrap\Label($content, $options);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Tag
     */
    public function jumbotron($content = '', $options = null)
    {
        $tag = $this->div($content, $options);
        $tag->addClass('jumbotron');
        return $tag;
    }
    
    /**
     * 
     * @param string $content
     * @return \PhpBootstrap\Span
     */
    public function caret()
    {
        return $this->span('', ['class' => 'caret']);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\PageHeader
     */
    public function pageHeader($content, $options = null)
    {
        return new Bootstrap\PageHeader($content, $options);
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Well
     */
    public function well($content = '', $options = null)
    {
        return new Bootstrap\Well($content, $options);
    }
        
    /**
     * 
     * @param string $icon
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Glyphicon
     */
    public function glyphicon($icon, $options = null)
    {
        return new Bootstrap\Glyphicon($icon, $options);
    }
    
    /**
     * Alias for glyphicon()
     */
    public function icon($icon, $options = null)
    {
        return $this->glyphicon($icon, $options);
    }
    
    /**
     * 
     * @param mixed $body
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Panel
     */
    public function panel($body = null, $options = null)
    {
       return new Bootstrap\Panel($body, $options);
    }
    
    /**
     * 
     * @param int   $value
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\ProgressBar
     */
    public function progressBar($value = 0, $options = null)
    {
       return new Bootstrap\ProgressBar($value, $options);
    }
    
    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Bootstrap\Tabs
     */
    public function tabs($items = null, $options = null)
    {
       return new Bootstrap\Tabs($items, $options);
    }
    
    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Bootstrap\Pills
     */
    public function pills($items = null, $options = null)
    {
       return new Bootstrap\Pills($items, $options);
    }
    
    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Bootstrap\Breadcrumbs
     */
    public function breadcrumbs($items = null, $options = null)
    {
       return new Bootstrap\Breadcrumbs($items, $options);
    }

    /**
     * 
     * @param int $pages
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function pagination($pages, $options = null)
    {
        return new Bootstrap\Pagination($pages, $options);
    }
    
    /**
     * 
     * @param mixed $button
     * @param array $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function dropdown($button, array $items = null, $options = null)
    {
        return new Bootstrap\Dropdown($button, $items, $options);
    }
    
    /**
     * 
     * @param array $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Carousel
     */
    public function carousel(array $items = null, $options = null) 
    {
        return new Bootstrap\Carousel($items, $options);
    }

    /**
     * 
     * @param mixed $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\ListGroup
     */
    public function listGroup($items = null, $options = null)
    {
        return new Bootstrap\ListGroup($items, $options);
    }
    
    /**
     * 
     * @param string $body
     * @param array $options
     * @return \PhpBootstrap\Bootstrap\Modal
     */
    public function modal($body = '', $options = null)
    {
        return new Bootstrap\Modal($body, $options);
    }
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Nav
     */
    public function nav($items = null, $options = null)
    {
        return new Bootstrap\Nav($items, $options);
    }
    
    /**
     * 
     * @param mixed $items
     * @param array $options
     * @return \PhpBootstrap\Bootstrap\Navbar
     */
    public function navbar($items = null, $options = null)
    {
        return new Bootstrap\Navbar($items, $options);
    }
    
}
