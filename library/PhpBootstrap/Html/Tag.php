<?php

namespace PhpBootstrap\Html;

/**
 * Tag
 *
 * Creates an HTML tag
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Tag
{    
    /**
     * Element tag
     * @var string
     */
    protected $tag;
    
    /**
     * Element metadata and attributes
     * @var array
     */
    protected $attribs = [
        'id'    => null,
        'class' => [],
        'style' => []
    ];
    
    /**
     *
     * @var string
     */
    protected $content;
    
    /**
     * 
     * @param string $tag
     * @param mixed $content
     * @param mixed $options
     */
    public function __construct($tag, $content = null, $options = null)
    {
        $this->init();
                
        if ($content && is_array($content)) {
            $options = $content;
            $content = null;
        }
        
        if (is_array($tag) && isset($tag['tag'])) {
            $options = $tag;
        } elseif (is_array($options)) {
            $options['tag'] = $tag;
        } else {
            $options = ['tag' => $tag];
        }
        
        if (!$content && isset($options['content'])) {
            $content = $options['content'];
        }
        
        $options['content'] = $content;
        
        if ($options && is_array($options)) {
            $this->setOptions($options);
        }
    }
    
    protected function init() { }
    
    /**
     * 
     * @param string $tag
     * @return \PhpBootstrap\Html\Tag
     */
    protected function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * 
     * @param array $options
     */    
    public function setOptions(array $options)
    {
        foreach($options as $option => $value) {
            $methodAdd = 'add' . ucfirst($option);
            $methodSet = 'set' . ucfirst($option);            
            if (method_exists($this, $option)) {
                $this->$option($value);
            } elseif (method_exists($this, $methodAdd)) {
                $this->$methodAdd($value);
            } elseif (method_exists($this, $methodSet)) {
                $this->$methodSet($value);
            } else {
                $this->setAttrib($option, $value);
            }
        }
    }
    
    /**
     * Set element attribute
     *
     * @param  string $key
     * @param  mixed $value
     * @return \PhpBootstrap\Html\Tag
     */
    public function setAttrib($key, $value)
    {
        $key = (string) $key;
        $this->attribs[$key] = $value;
        return $this;
    }

    /**
     * Add multiple element attributes at once
     *
     * @param  array $attribs
     * @return \PhpBootstrap\Html\Tag
     */
    public function addAttribs(array $attribs)
    {
        foreach ($attribs as $key => $value) {
            $this->setAttrib($key, $value);
        }
        return $this;
    }

    /**
     * Set multiple element attributes at once
     *
     * Overwrites any previously set attributes.
     *
     * @param  array $attribs
     * @return \PhpBootstrap\Html\Tag
     */
    public function setAttribs(array $attribs)
    {
        $this->clearAttribs();
        return $this->addAttribs($attribs);
    }

    public function hasAttrib($key)
    {
        return isset($this->attribs[$key]);
    }
    
    /**
     * Retrieve a single element attribute
     *
     * @param  string $key
     * @return mixed
     */
    public function getAttrib($key)
    {
        $key = (string) $key;
        if (!$this->hasAttrib($key)) {
            return null;
        }

        return $this->attribs[$key];
    }

    /**
     * Retrieve all element attributes/metadata
     *
     * @return array
     */
    public function getAttribs()
    {
        return $this->attribs;
    }

    /**
     * Remove attribute
     *
     * @param  string $key
     * @return bool
     */
    public function removeAttrib($key)
    {
        if (isset($this->attribs[$key])) {
            unset($this->attribs[$key]);
            return true;
        }

        return false;
    }

    /**
     * Clear all element attributes
     *
     * @return \PhpBootstrap\Html\Tag
     */
    public function clearAttribs()
    {
        $this->attribs = [];
        return $this;
    }
    
    /**
     *
     * @param string $id
     * @return \PhpBootstrap\Html\Tag
     */
    public function id($id)
    {
        return $this->setAttrib('id', $id);
    }
    
    /**
     * 
     * @param  string $class
     * @return boolean
     */
    public function hasClass($class)
    {
        return in_array($class, $this->getClass());
    }
    
    /**
     * 
     * @return array
     */
    public function getClass()
    {
        $cssClass = $this->getAttrib('class');
        if (!is_array($cssClass) && $cssClass) {
            $this->setAttrib('class', [$cssClass]);
        }

        return $this->getAttrib('class');
    }
    
    /**
     *
     * @param string $class
     * @return \PhpBootstrap\Html\Tag
     */    
    public function addClass($class)
    {
        $classes = $this->getClass();
        if (is_string($class) && strstr($class, ' ')) {
            $class = explode(' ', $class);
        }
        if (is_array($class)) {
            $classes = array_merge($classes, $class);
        } else {
            $classes[] = $class;
        }

        return $this->setAttrib('class', array_unique($classes));
    }
    
    /**
     * 
     * @param string $class
     * @return \PhpBootstrap\Html\Tag
     */
    public function removeClass($class)
    {
        $classes = $this->getClass();
        $classes = array_diff($classes, (array) $class);
        return $this->setAttrib('class', $classes);
    }
    
    /**
     * 
     * @return array
     */
    public function getStyle()
    {
        return $this->getAttrib('style');
    }
    
    /**
     * 
     * @param array $styles
     * @return \PhpBootstrap\Html\Tag
     */
    public function setStyles(array $styles)
    {
        foreach($styles as $key => $value) {
            if (is_array($value) || is_numeric($key)) {
                $this->setStyle($value);
            } else {
                $this->setStyle($key, $value);
            }
        }
        return $this;
    }
    
    /**
     *
     * @param mixed  $key
     * @param string $value
     * @return \PhpBootstrap\Html\Tag
     */    
    public function setStyle($key, $value=null)
    {
        if (is_array($key)) {
            return $this->setStyles($key);
        } 
        if (strstr($key, ';')) {
            return $this->setStyles(explode(';', $key));
        }
        if (strstr($key, ':')) {
            list($key, $value) = explode(':', $key);
        }
        
        $style = trim($key);
        $val = trim($value, ' "\';');
        
        if ($style && $val) {
            $this->attribs['style'][$style] = $val;
        }
        return $this;
    }
    
    /**
     * 
     * @param string $key
     * @return \PhpBootstrap\Html\Tag
     */
    public function removeStyle($key)
    {
        unset($this->attribs['style'][$key]);
        return $this;
    }
    
    /**
     * 
     * @param string $attrib
     * @param string $value
     * @return type
     */
    public function aria($attrib, $value) 
    {
        return $this->setAttrib("aria-{$attrib}", $value);
    }
    
    /**
     * 
     * @param string $attrib
     * @param string $value
     * @return type
     */
    public function data($attrib, $value) 
    {
        return $this->setAttrib("data-{$attrib}", $value);
    }
    
    public function srOnly($focusable = false)
    {
        $this->addClass('sr-only');
        if ($focusable) {
            $this->addClass('sr-only-focusable');
        }
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 
     * @param string $content
     * @return \PhpBootstrap\Html\Tag
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
      
    /**
     * 
     * @param string $content
     * @param string $separator
     * @return \PhpBootstrap\Html\Tag
     */
    public function append($content, $separator = '')
    {
        return $this->setContent($this->content . $separator . $content);
    }
    
    /**
     * 
     * @param string $content
     * @param string $separator
     * @return \PhpBootstrap\Html\Tag
     */
    public function prepend($content, $separator = '')
    {
        return $this->setContent($content . $separator . $this->content);
    }
        
    /**
     * 
     * @return string
     */
    public function renderAttribs()
    {
        $attribs = [];
        foreach($this->attribs as $key => $val) {
            $value = $val;
            if ($key == 'style') {
                $styles = [];
                foreach($val as $k => $v) {
                    $styles[] = "{$k}:{$v}";
                }
                $value = implode(';', $styles);
            } elseif (is_array($val)) {
                $value = implode(' ', $val);
            }
            if (is_bool($value)) {
                if ($value === true) {
                    $attribs[] = $key;
                }
            } elseif (!is_null($value) && $value !== '') {
                $attribs[] = $key . '="' . $value . '"';
            }
        }
        return $attribs ? ' ' . implode(' ', $attribs) : '';
    }
    
    /**
     * 
     * @param string $content
     * @return string
     */
    public function render()
    {
        $html = '<' . $this->tag 
              . $this->renderAttribs();
        
        if ($this->getContent() === null) {
            $html .= ' />';
        } else {
            $html .= '>' . $this->getContent()
                   . '</' . $this->tag . '>';
        }
        
        return $html;
    }
    
    public function __toString()
    {
        return $this->render();
    }
    
}
