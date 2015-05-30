<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Form\Element\Button,
    PhpBootstrap\Html\Ul,
    PhpBootstrap\Html\Link;

/**
 * Bootstrap Dropdown
 * 
 * Creates an HTML unordered list
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Dropdown extends Component
{
    /**
     *
     * @var \PhpBootstrap\Html\Form\Element\Button
     */
    protected $button;
    
    /**
     *
     * @var \PhpBootstrap\Html\Ul
     */
    protected $ul;
    
    /**
     * 
     * @param mixed $button
     * @param array $items
     * @param mixed $options
     */
    public function __construct($button, array $items = null, $options = null)
    {
        parent::__construct(new Tag('div', ''));
        $this->down();
        
        $this->setButton($button);
        
        $this->ul = new Ul('', ['class' => 'dropdown-menu', 'role'  => 'menu']);
        
        if ($items) {
            $this->setItems($items);
        }
        if ($options) {
            $this->tag->setOptions($options);
        }
    }
    
    /**
     * 
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function down()
    {
        $this->tag->removeClass('dropup')
                  ->addClass('dropdown');
        return $this;
    }
    
    /**
     * 
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function up()
    {
        $this->tag->removeClass('dropdown')
                  ->addClass('dropup');
        return $this;
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Form\Element\Button
     */
    public function getButton()
    {
        return $this->button;
    }
    
    /**
     * 
     * @return \PhpBootstrap\Html\Ul
     */
    public function getUl()
    {
        return $this->ul;
    }
    
    /**
     * 
     * @param mixed $button
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function setButton($button, $options=null)
    {
        $this->button = $button instanceof Button
                      ? $button
                      : new Button('dropdown_btn');
        $this->button->removeAttrib('name');
        
        $this->button->addClass('btn-default');
        if ($options) {
            $this->button->setOptions($options);
        }
        
        $this->button->addClass('dropdown-toggle')
                     ->data('toggle', 'dropdown')
                     ->aria('expanded', 'false')
                     ->setLabel($button . ' <span class="caret"></span>');
        
        return $this;
    }
    
    /**
     * 
     * @param array $items
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function setItems(array $items)
    {
        foreach($items as $content => $options) {
            $this->addItem($content, $options);
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $content
     * @param mixed $options
     * @return \PhpBootstrap\Bootstrap\Dropdown
     */
    public function addItem($content, $options = null)
    {
        if ($options == 'HEADER') {
            $this->ul->addItem($content, ['role' => 'presentation', 
                                          'class' => 'dropdown-header']);
        } elseif ($options == 'DIVIDER') {
            $this->ul->addItem('', ['role' => 'presentation', 
                                    'class' => 'divider']);
        } else {
            $link = new Link($content, $options);
            $link->addAttribs([
                'role'     => 'menuitem',
                'tabindex' => '-1',
            ]);

            $this->ul->addItem($link->render(), ['role' => 'presentation']);
        }
            
        return $this;
    }
    
    public function menuLeft()
    {
        $this->ul->removeClass('dropdown-menu-right');
        return $this;
    }
    
    public function menuRight()
    {
        $this->ul->addClass('dropdown-menu-right');
        return $this;
    }
    
    public function render()
    {
        $id = $this->tag->getAttrib('id')
            ? $this->tag->getAttrib('id') . '_button'
            : uniqid();
        
        $this->button->id($id);
        $this->ul->aria('labelledby', $id);
        
        return $this->tag->append($this->button->render())
                         ->append($this->ul->render())
                         ->render();
    }
    
}
