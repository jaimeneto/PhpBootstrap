<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;
use PhpBootstrap\Html\Ol;
use PhpBootstrap\Html\Link;
use PhpBootstrap\Html\Img;

/**
 * Bootstrap Carousel
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Carousel extends Component
{
    /**
     *
     * @var PhpBootstrap\Html\Ol
     */
    protected $indicators;
    
    /**
     * Div
     * @var PhpBootstrap\Html\Tag
     */
    protected $inner;
    
    protected $previousLabel = 'Previous';
    protected $nextLabel = 'Next';
    protected $hideIndicators = false;
    protected $hideControls = false;
    
    /**
     * 
     * @param string $id
     * @param array $items
     * @param mixed $options
     */
    public function __construct(array $items = null, $options = null)
    {
        if (is_string($options)) {
            $options = ['id' => $options];
        }
        parent::__construct(new Tag('div', '', $options));
        $this->tag->addClass('carousel');
        $this->tag->addClass('slide');
        $this->tag->data('ride', 'carousel');
        
        $this->indicators = new Ol(null, ['class' => 'carousel-indicators']);
        $this->inner = new Tag('div', ['class' => 'carousel-inner', 'role' => 'listbox']);
        
        if ($items) {
            $this->setItems($items);
        }
    }
    
    public function setPreviousLabel($label)
    {
        $this->previousLabel = $label;
        return $this;
    }
    
    public function setNextLabel($label)
    {
        $this->nextLabel = $label;
        return $this;
    }
    
    public function hideControls($bool = true)
    {
        $this->hideControls = (bool) $bool;
        return $this;
    }
    
    public function hideIndicators($bool = true)
    {
        $this->hideIndicators = (bool) $bool;
        return $this;
    }
    
    protected function appendControls()
    {
        $previous = new Link(
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>'
                . '<span class="sr-only">' . $this->previousLabel . '</span>', [
            'href'       => '#' . $this->getAttrib('id'),
            'class'      => ['left', 'carousel-control'],
            'role'       => 'button',
            'data-slide' => 'prev'
        ]);
        $this->tag->append($previous);
        
        $next = new Link(
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                . '<span class="sr-only">' . $this->nextLabel . '</span>', [
            'href'       => '#' . $this->getAttrib('id'),
            'class'      => ['right', 'carousel-control'],
            'role'       => 'button',
            'data-slide' => 'next'
        ]);
        $this->tag->append($next);
    }
    
    public function setItems(array $items, $options = null)
    {
        foreach($items as $item) {
            $this->addItem($item);
        }
        return $this;
    }
    
    public function addItem($item, $description = null, $title = null, 
                            $active = false)
    {
        if (is_array($item)) {
            if (isset($item['description'])) {
                $description = $item['description'];
            }
            if (isset($item['title'])) {
                $title = $item['title'];
            }
            if (isset($item['active']) && $item['active']) {
                $active = true;
            }
            if (isset($item['img'])) {
                $item = $item['img'];
            }
        }
        if ($item instanceof Img) {
            $img = $item;
        } elseif (is_string($item)) {
            $img = new Img($item);
        }
        
        $div = new Tag('div', $img, ['class' => 'item']);
        if ($active) {
            $div->addClass('active');
        }
        
        if ($title || $description) {
            $caption = new Tag('div', '', ['class' => 'carousel-caption']);
            
            if ($title) {
                $caption->append(new Tag('h3', $title));
            }
            
            if ($description) {
                $caption->append(new Tag('p', $description));
            }
            
            $div->append($caption);
        }
        
        $this->inner->append($div);
        $indicatorOptions = $active ? ['class' => 'active'] : null;
        $this->indicators->addItem('', $indicatorOptions);
        
        return $this;
    }
    
    public function render()
    {
        if (!$this->tag->getAttrib('id')) {
            $this->id(uniqid());
        }

        if (!$this->hideIndicators) {
            foreach($this->indicators->getItems() as $num => $item) {
                $item->data('target', '#' . $this->getAttrib('id'));
                $item->data('slide-to', $num);
            }
            $this->append($this->indicators);
        }
        
        $this->append($this->inner);
        
        if (!$this->hideControls) {
            $this->appendControls();
        }
        
        return $this->tag->render();
    }
    
}
