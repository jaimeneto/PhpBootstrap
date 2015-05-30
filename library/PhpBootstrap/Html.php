<?php

namespace PhpBootstrap;

/**
 * Html Factory
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
final class Html
{
    public function __call($name, $arguments)
    {
        $content = isset($arguments[0]) ? $arguments[0] : null;
        $options = isset($arguments[1]) ? $arguments[1] : null;
        return $this->tag($name, $content, $options);
    }
    
    /**
     * 
     * @param string $tag
     * @param mixed  $content
     * @param mixed  $options
     * @return \PhpBootstrap\Html\Tag
     */
    public function tag($tag, $content = null, $options = null)
    {
        return new \PhpBootstrap\Html\Tag($tag, $content, $options);
    }
    
    /**
     * 
     * @param string $src
     * @param array $options
     * @return \PhpBootstrap\Html\Img
     */
    public function img($src, $options = null)
    {
        return new \PhpBootstrap\Html\Img($src, $options);
    }
    
    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Html\Ol
     */
    public function ol($items = null, $options = null)
    {
        return new \PhpBootstrap\Html\Ol($items, $options);
    }

    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Html\Ul
     */
    public function ul($items = null, $options = null)
    {
        return new \PhpBootstrap\Html\Ul($items, $options);
    }

    /**
     * 
     * @param array $items
     * @param array $options
     * @return \PhpBootstrap\Html\Dl
     */
    public function dl($items = null, $options = null)
    {
        return new \PhpBootstrap\Html\Dl($items, $options);
    }

    /**
     * 
     * @param array $elements
     * @param array $options
     * @return \PhpBootstrap\Html\Form
     */
    public function form($elements = null, $options = null)
    {
        return new \PhpBootstrap\Html\Form($elements, $options);
    }
    
    /**
     * 
     * @param string $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Link
     */
    public function link($content = '', $options = null)
    {
        return new \PhpBootstrap\Html\Link($content, $options);
    }
    
    /**
     * Alias for link()
     * 
     * @param string $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Link
     */
    public function a($content = '', $options = null)
    {
        return $this->link($content, $options);
    }
    
    /**
     * 
     * @param string $content
     * @param mixed $options
     * @return \PhpBootstrap\Html\Fieldset
     */
    public function fieldset($content = '', $options = null)
    {
        return new \PhpBootstrap\Html\Fieldset($content, $options);
    }

    
    
}
