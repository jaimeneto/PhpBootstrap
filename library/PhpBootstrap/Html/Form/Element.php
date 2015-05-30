<?php

namespace PhpBootstrap\Html\Form;

use PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Form\Decorator as FormDecorator;

/**
 * Form Element
 *
 * Creates an HTML form element
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
abstract class Element extends Tag
{
    /**
     *
     * @var string
     */
    protected $name;
       
    /**
     *
     * @var string
     */
    protected $label;
    
    /**
     *
     * @var array
     */
    protected $decorators = [];
    
    /**
     *
     * @var string
     */
    protected $help;
    
    /**
     * 
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options = null)
    {
        $this->id("form_{$name}");
        $this->setName($name);
        $this->setValue('');
        
        parent::__construct($this->tag, $this->content, $options);
    }
    
    public function clearDecorators()
    {
        $this->decorators = [];
        return $this;
    }
    
    public function setDecorators(array $decorators)
    {
        $this->clearDecorators();
        foreach($decorators as $options) {
            $this->addDecorator($options);
        }
    }
    
    /**
     * 
     * @param mixed  $decorator
     * @param array  $options
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function addDecorator($decorator, array $options = null)
    {
        if ($decorator instanceof FormDecorator) {
            $dec = $decorator;
        } else {
            if (is_array($decorator) && isset($decorator['type'])) {
                $options = $decorator;
                $decorator = $options['type'];
                unset($options['type']);
            }
            
            $namespace = '\PhpBootstrap\Html\Form\Decorator\\' . ucfirst($decorator);
            
            $name = isset($options['name']) 
                  ? $options['name'] 
                  : ucfirst($decorator);
            
            unset($options['name']);
            
            $dec = new $namespace($options);
        }
        
        $dec->setElement($this);
        $this->decorators[$name] = $dec;
        return $this;
    }
    
    /**
     * 
     * @param string $name
     * @return \PhpBootstrap\Html\Form\Decorator
     */
    public function getDecorator($name)
    {
        return $this->decorators[$name];
    }

    /**
     * 
     * @return array
     */
    public function getDecorators()
    {
        return $this->decorators;
    }
    
    /**
     * 
     * @param string $name
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function setName($name)
    {
        return $this->setAttrib('name', $name);
    }
    
    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->getAttrib('name');
    }
    
    /**
     * 
     * @param string $value
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function setValue($value)
    {
        return $this->setAttrib('value', $value);
    }
    
    /**
     * 
     * @return string
     */
    public function getValue()
    {
        return $this->getAttrib('value');
    }
        
    /**
     * 
     * @param string $label
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function setLabel($label)
    {
        return $this->label = $label;
    }
    
    /**
     * 
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function readOnly($bool = true)
    {
        return $this->setAttrib('readonly', (bool) $bool);
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function disabled($bool = true)
    {
        return $this->setAttrib('disabled', (bool) $bool);
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function autofocus($bool = true)
    {
        return $this->setAttrib('autofocus', (bool) $bool);
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function required($bool = true)
    {
        return $this->setAttrib('required', (bool) $bool);
    }

    public function validationState($state)
    {
        $states = ['has-success', 'has-warning', 'has-error'];
        
        $decorator = $this->getDecorator('formgroup');
        if ($decorator) {
            $decorator->removeClass($states);
            if ($decorator) {
                $state = "has-{$state}";
                if (in_array($state, $states)) {
                    $decorator->addClass($state);
                }
            }
        }
        return $this;
    }
    
    public function hasSuccess()
    {
        return $this->validationState('success');
    }
    
    public function hasWarning()
    {
        return $this->validationState('warning');
    }

    public function hasError()
    {
        return $this->validationState('error');
    }
        
    public function size($size)
    {
        $sizes = ['input-lg', 'input-sm'];
        
        $this->removeClass($sizes);
        $size = "input-{$size}";
        if (in_array($size, $sizes)) {
            $this->addClass($size);
        }
        return $this;
    }
    
    public function large()
    {
        return $this->size('lg');
    }
    
    public function small()
    {
        return $this->size('sm');
    }
    
    public function groupSize($size)
    {
        $sizes = ['form-group-lg', 'form-group-sm'];
        
        $decorator = $this->getDecorator('formgroup');
        if ($decorator) {
            $decorator->removeClass($sizes);
            if ($decorator) {
                $size = "form-group-{$size}";
                if (in_array($size, $sizes)) {
                    $decorator->addClass($size);
                }
            }
        }
        return $this;
    }
    
    public function groupLarge()
    {
        return $this->groupSize('lg');
    }
    
    public function groupSmall()
    {
        return $this->groupSize('sm');
    }
    
    public function setHelp($text)
    {
        $this->help = $text;
        return $this;
    }
    
    public function getHelp()
    {
        return $this->help;
    }
    
    /**
     * render without decorators
     * 
     * @return string
     */
    public function renderPartial()
    {
        return parent::render();
    }
    
    public function render()
    {
        $decorators = $this->getDecorators();
        
        if ($decorators) {
            foreach($decorators as $decorator) {
                if (isset($html)) {
                    $decorator->setContent($html);
                }
                $html = $decorator->render();
            }
        } else {
            $html = $this->renderPartial();
        }
        
        return $html;
    }
    
}
