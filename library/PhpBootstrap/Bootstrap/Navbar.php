<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component;
use PhpBootstrap\Bootstrap\Nav;
use PhpBootstrap\Html\Tag;
use PhpBootstrap\Html\Form;
use PhpBootstrap\Html\Link;
use PhpBootstrap\Html\Form\Element\Button;

/**
 * Bootstrap Navbar
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Navbar extends Component
{
    protected $navbarContainer;
    protected $navbarHeader;
    protected $navbarCollapse;
    protected $navbarForm;
    protected $navbarRight;
    
    /**
     * 
     * @param mixed $items
     * @param array $options
     */
    public function __construct($items = null, $options = null)
    {
        if ($options && is_string($options)) {
            $id = $options;
            $options = null;
        }
        
        $this->navbarContainer = new Tag('div', '', ['class' => 'container-fluid']);
        $this->navbarHeader = new Tag('div', '', ['class' => 'navbar-header']);
        $this->navbarCollapse = new Tag('div', '', ['class' => 'collapse navbar-collapse']);
                
        if (isset($options['id'])) {
            $this->navbarCollapse->id($options['id']);
            unset($options['id']);
        }
        
        parent::__construct(new Tag('nav', '', ['class' => 'navbar navbar-default']));

        if ($items) {
            $this->setItems($items);
        }
        
        if ($options) {
            $this->tag->setOptions($options);
        }
    }

    public function fixedTop()
    {
        $this->tag->removeClass(['navbar-fixed-bottom', 'navbar-static-top']);
        return $this->tag->addClass('navbar-fixed-top');
    }

    public function fixedBottom()
    {
        $this->tag->removeClass(['navbar-fixed-top', 'navbar-static-top']);
        return $this->tag->addClass('navbar-fixed-bottom');
    }
    
    public function staticTop()
    {
        $this->tag->removeClass(['navbar-fixed-top', 'navbar-fixed-bottom']);
        return $this->tag->addClass('navbar-static-top');
    }
    
    public function inverse($bool = true)
    {
        if ($bool) {
            $this->tag->removeClass('navbar-default');
            return $this->tag->addClass('navbar-inverse');
        }
        
        $this->tag->removeClass('navbar-inverse');
        return $this->tag->addClass('navbar-default');
    }
    
    public function setHeader($brand = null, $href = null, $srOnly = 'Toggle navigation')
    {
        $buttonContent = '';
        if ($srOnly) {
            $screenReader = new Tag('span', $srOnly, ['class' => 'sr-only']);
            $buttonContent .= $screenReader->render();    
        }
        
        $iconBar = new Tag('span', '', ['class' => 'icon-bar']);
        $buttonContent .= $iconBar->render()
                        . $iconBar->render()
                        . $iconBar->render();
        
        $button = new Button('toggle_navigation', ['label' => $buttonContent]);
        $button->addClass('navbar-toggle collapsed');
        $button->data('toggle', 'collapse');
        $button->removeAttrib('id');
        $button->removeAttrib('name');
        $button->removeClass('btn');

        if ($this->navbarCollapse->getAttrib('id')) {
            $button->data('target', '#' . $this->navbarCollapse->getAttrib('id'));
        }
        
        $this->navbarHeader->prepend($button);
        
        if ($brand) {
            $this->navbarHeader->append(new Link($brand, [
                'href'  => $href ? $href : '#', 
                'class' => 'navbar-brand'
            ]));
        }
        
        
        return $this;
    }
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Navbar
     */
    public function setItems($items, $options = null, $right = false)
    {
        if ($items instanceof Nav) {
            $nav = $items;
            
            if ($options) {
                $nav->setOptions($options);       
            }
        } else {
            $nav = new Nav($items, $options);
        }
        
        $nav->addClass('navbar-nav');
        
        if ($right) {
            $nav->addClass('navbar-right');
            $this->navbarRight = $nav;
        } else {
            $this->navbarCollapse->setContent($nav->render());    
        }
        
        return $this;
    }
    
    /**
     * 
     * @param mixed $items
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Navbar
     */
    public function setRightItems($items, $options = null)
    {
        return $this->setItems($items, $options, true);
    }
    
    public function setForm($elements, $options = null)
    {
        if ($elements instanceof Form) {
            $this->navbarForm = $elements;
            
            if ($this->navbarForm) {
                $this->navbarForm->setOptions($options);       
            }
        } else {
            $this->navbarForm = new Form($elements, $options);
        }
        $this->navbarForm->setDisposition('navbar');
    }
    
    public function render()
    {
        if ($this->navbarForm) {
            $this->navbarCollapse->append($this->navbarForm);
        }
        
        if ($this->navbarRight) {
            $this->navbarCollapse->append($this->navbarRight);
        }
        
        $this->navbarContainer->setContent($this->navbarCollapse->render());
        $this->navbarContainer->prepend($this->navbarHeader->render());

        $this->tag->setContent($this->navbarContainer->render());
        
        return $this->tag->render();
    }
    
}
