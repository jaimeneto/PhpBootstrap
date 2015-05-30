<?php

namespace PhpBootstrap\Html;

use PhpBootstrap\Html\Form\Element as FormElement,
    ArrayObject;

/**
 * Form
 *
 * Creates an HTML form
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Form extends Tag
{
    /**
     * List of \PhpBootstrap\Html\Form\Element
     * 
     * @var ArrayObject
     */
    protected $elements;

    /**
     * List of \PhpBootstrap\Html\Form\Element\Group
     * 
     * @var ArrayObject
     */
    protected $groups;
    
    /**
     *
     * @var string
     */
    protected $disposition = 'vertical';
    
    /**
     *
     * @var array 
     */
    protected $elementDecorators = [
        'vertical' => [
            '*' => [ 
                [
                    'name'  => 'helpblock',
                    'type'  => 'helpBlock'
                ], [
                    'name'  => 'label',
                    'type'  => 'label',
                    'class' => 'control-label'
                ], [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'checkbox' => [
                [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper'
                ]
            ],
            'button' => [],
            'hidden' => []
        ],
        'horizontal' => [
            '*' => [ 
                [
                    'name'  => 'helpblock',
                    'type'  => 'helpBlock'
                ], [
                    'name'  => 'wrapper',
                    'type'  => 'wrapper',
                    'class' => 'col-sm-10'
                ], [
                    'name'  => 'label',
                    'type'  => 'label',
                    'class' => ['col-sm-2', 'control-label']
                ], [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'checkbox' => [
                [
                    'name'  => 'helpblock',
                    'type'  => 'helpBlock'
                ], [
                    'name'  => 'wrapper',
                    'type'  => 'wrapper',
                    'class' => ['col-sm-offset-2', 'col-sm-10']
                ], [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'button' => [
                [
                    'name'  => 'helpblock',
                    'type'  => 'helpBlock'
                ], [
                    'name'  => 'wrapper',
                    'type'  => 'wrapper',
                    'class' => ['col-sm-offset-2', 'col-sm-10']
                ], [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'hidden' => []
        ],
        'inline' => [
            '*' => [ 
                [
                    'name'  => 'label',
                    'type'  => 'label',
                    'class' => 'control-label'
                ], [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'checkbox' => [
                [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'checkbox'
                ]
            ],
            'button' => [],
            'hidden' => []
        ],
        'navbar' => [
            '*' => [
                [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'form-group'
                ]
            ],
            'checkbox' => [
                [
                    'name'  => 'formgroup',
                    'type'  => 'wrapper',
                    'class' => 'checkbox'
                ]
            ],
            'button' => [],
            'hidden' => []
        ]
    ];
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     */
    public function __construct($elements = null, $options = null)
    {
        $this->action('');
        $this->method('post');
        $this->enctype('');
        $this->clearElements();
        
        if ($elements) {
            $this->setElements($elements);
        }
        
        parent::__construct('form', '', $options);
    }
    
    /**
     * 
     * @param string $action
     * @return \PhpBootstrap\Html\Form
     */
    public function action($action)
    {
        return $this->setAttrib('action', $action);
    }
    
    /**
     * 
     * @param string $method
     * @return \PhpBootstrap\Html\Form
     */
    public function method($method)
    {
        return $this->setAttrib('method', $method);
    }
    
    /**
     * 
     * @param string $enctype
     * @return \PhpBootstrap\Html\Form
     */
    public function enctype($enctype)
    {
        return $this->setAttrib('enctype', $enctype);
    }
    
    /**
     * 
     * @param  string $disposition horizontal|vertical|inline
     * @return \PhpBootstrap\Html\Form
     */
    public function setDisposition($disposition)
    {
        $this->disposition = 'vertical';
        $this->removeClass(['form-inline', 'form-horizontal', 'navbar-form']);
        if (in_array($disposition, ['horizontal', 'inline', 'navbar'])) {
            $this->disposition = $disposition;
            $dispositionClass = $disposition == 'navbar' 
                              ? 'navbar-form' 
                              : "form-{$disposition}";
            $this->addClass($dispositionClass);
            $this->resetElementsDecorators();
        }
        return $this;
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Form
     */
    public function vertical()
    {
        return $this->setDisposition('vertical');
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Form
     */
    public function horizontal()
    {
        return $this->setDisposition('horizontal');
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Form
     */
    public function inline()
    {
        return $this->setDisposition('inline');
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Form
     */
    public function clearElements()
    {
        $this->elements = new ArrayObject();
        return $this;
    }
    
    /**
     * 
     * @param array $elements
     * @return \PhpBootstrap\Html\Form
     */
    public function setElements(array $elements)
    {
        $this->clearElements();
        foreach($elements as $element) {
            $this->addElement($element);
        }
        return $this;
    }
        
    /**
     * Alias for createElement()
     */
    public function create($element, $name = null, array $options = null)
    {
        return $this->createElement($element, $name, $options);
    }
    
    /**
     * 
     * @param string $element
     * @param string $name
     * @param array $options
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function createElement($element, $name = null, array $options = null)
    {
        if ($element instanceof FormElement\Group) {
            $elem = $element;
            $this->groups[$name] = isset($options['elements']) 
                        ? $options['elements'] : [];
            unset($options['elements']);
        } 
        
        if ($element instanceof FormElement) {
            $elem = $element;
            $element = strtolower(end(explode('\\', get_class($elem))));
        } else {
            if (is_array($element) && isset($element['element'])) {
                $options = $element;
                $element = $options['element'];
                $name = $options['name'];
                unset($options['element'], $options['name']);
            }
            
            if ($element == 'group' || $element == 'Group') {
                $this->groups[$name] = isset($options['elements']) 
                        ? $options['elements'] : [];
                unset($options['elements']);
            }
            
            $elementNamespace = '\PhpBootstrap\Html\Form\Element\\' 
                              . ucfirst($element);
            $elem = new $elementNamespace($name, $options);
        }
        
        $this->defineElementDecorators($elem);
        
        return $elem;
    }
    
    protected function defineElementDecorators($element)
    {
        $elementDecorators = $this->elementDecorators[$this->disposition];
        if ($elementDecorators) {
            $decoratorsAdded = false;
            foreach($elementDecorators as $class => $elemDecorators) {
                if ($class == '*') continue;
                $namespace = '\PhpBootstrap\Html\Form\Element\\' 
                           . ucfirst($class);
                if ($element instanceof $namespace) {
                    $element->setDecorators($elemDecorators);
                    $decoratorsAdded = true;
                }
            }
            if (!$decoratorsAdded && isset($elementDecorators['*']) 
                    && $elementDecorators['*']) {
                $element->setDecorators($elementDecorators['*']);
            }
        }
        return $this;
    }
    
    public function resetElementsDecorators()
    {
        foreach($this->getElements() as $element) {
            $this->defineElementDecorators($element);
        }
        return $this;
    }
    
    /**
     * Alias for addElement()
     */
    public function add($element, $name = null, array $options = null)
    {
        return $this->addElement($element, $name, $options);
    }
    
    /**
     * 
     * @param mixed  $element
     * @param string $name
     * @param array  $options
     * @return \PhpBootstrap\Html\Form
     */
    public function addElement($element, $name = null, array $options = null)
    {
        $elem = $this->createElement($element, $name, $options);
        
        $this->elements[$elem->getName()] = $elem;
        return $this;
    }
    
    /**
     * 
     * @param string $elementName
     * @return \PhpBootstrap\Html\Form
     */
    public function removeElement($elementName)
    {
        unset($this->elements[$elementName]);
        return $this;
    }
    
    /**
     * 
     * @param string $elementName
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function getElement($elementName)
    {
        return $this->elements[$elementName];
    }

    /**
     * 
     * @return ArrayObject
     */
    public function getElements()
    {
        return $this->elements;
    }
    
    /**
     * 
     * @return string
     */
    public function begin()
    {
        return '<' . $this->tag . $this->renderAttribs() . '>';
    }
    
    /**
     * 
     * @return string
     */
    public function end()
    {
        return '</form>';
    }
    
    protected function isElementInGroup($element)
    {
        if ($this->groups) {
            foreach($this->groups as $name => $elementNames) {
                if (in_array($element->getName(), $elementNames)) {
                    return true;
                }
            }
        }
        return false;
    }
    
    protected function addElementsToGroup($group) 
    {
        if (isset($this->groups[$group->getName()])) {
            foreach($this->groups[$group->getName()] as $elementName) {
                $group->addElement($this->elements[$elementName]);
            }
        }
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function render()
    {
        foreach($this->getElements() as $name => $element) {
            if ($element instanceof FormElement\Group) {
                $this->addElementsToGroup($element);
            } 
            if (!$this->isElementInGroup($element)) {
                $this->append($element->render());
            }
        }
        
        return parent::render();
    }
    
}
