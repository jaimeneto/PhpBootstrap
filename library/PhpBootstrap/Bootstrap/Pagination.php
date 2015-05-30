<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component,
    PhpBootstrap\Html\Tag,
    PhpBootstrap\Html\Ul,
    PhpBootstrap\Html\Link;

/**
 * Bootstrap Pagination
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Pagination extends Component
{    
    
    /**
     *
     * @var \PhpBootstrap\Html\Tag
     */
    protected $nav;
    
    /**
     *
     * @var integer
     */
    protected $pages;
    
    /**
     *
     * @var string
     */
    protected $pageArgument = 'p';
    
    /**
     *
     * @var integer
     */
    protected $page = 1;
    
    /**
     *
     * @var string
     */
    protected $href;
    
    /**
     *
     * @var string
     */
    protected $previewsLabel = '<span aria-hidden="true">&laquo;</span>';
    
    /**
     *
     * @var string
     */
    protected $nextLabel = '<span aria-hidden="true">&raquo;</span>';
    
    /**
     * 
     * @param int $pages
     * @param mixed $options
     */
    public function __construct($pages, $options = null)
    {
        $href = '';
        if ($options && is_string($options)) {
            $href = $options;
            $options = null;
        }
        
        $this->nav = new Tag('nav', '', $options);
        
        parent::__construct(new Ul());
        $this->tag->addClass('pagination');
        
        $this->pages($pages);
        $this->href($href);
    }
    
    /**
     * 
     * @param integer $pages
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function pages($pages)
    {
        $this->pages = (int) $pages;
        return $this;
    }
    
    /**
     * 
     * @param integer $page
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function page($page)
    {
        $this->page = (int) $page;
        return $this;
    }

    /**
     * 
     * @param string $href
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function href($href)
    {
        $this->href = rtrim($href, '/ ');
        return $this;
    }
    
    /**
     * 
     * @param string $size lg|sm
     * @return Pagination
     */
    public function size($size)
    {
        $sizes = ['pagination-lg', 'pagination-sm'];
        $this->tag->removeClass($sizes);
        $sizeClass = "pagination-{$size}";
        if (in_array($sizeClass, $sizes)) {
            $this->tag->addClass($sizeClass);
        }
        return $this;
    }
    
    /**
     * 
     * @return Pagination
     */
    public function large()
    {
        return $this->size('lg');
    }
    
    /**
     * 
     * @return Pagination
     */
    public function small()
    {
        return $this->size('sm');
    }
    
    /**
     * 
     * @param string $label
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function previewsLabel($label)
    {
        $this->previewsLabel = $label;
        return $this;
    }
    
    /**
     * 
     * @param string $label
     * @return \PhpBootstrap\Bootstrap\Pagination
     */
    public function nextLabel($label)
    {
        $this->nextLabel = $label;
        return $this;
    }
    
    protected function addPreviewsPage()
    {
        if ($this->previewsLabel) {
            $prevPage = $this->page - 1;
            $options = [];
            if ($this->page == 1) {
                $prevPage = 1;
                $options['class'] = 'disabled';
            }
            $href = "{$this->href}/{$this->pageArgument}/{$prevPage}";
            $link = new Link($this->previewsLabel, $href);
            $this->tag->addItem($link->render(), $options);
        }
        return $this;
    }
    
    protected function addAllPages() 
    {
        for($i = 1; $i <= $this->pages; $i++) {  
            $link = new Link($i, "{$this->href}/{$this->pageArgument}/{$i}");
            $options = [];
            if ($i == $this->page) {
                $options['class'] = 'active';
            }
            $this->tag->addItem($link->render(), $options);
        }
        return $this;
    }
    
    protected function addNextPage()
    {
        if ($this->nextLabel) {
            $nextPage = $this->page + 1;
            $options = [];
            if ($this->page == $this->pages) {
                $nextPage = $this->pages;
                $options['class'] = 'disabled';
            }
            $href = "{$this->href}/{$this->pageArgument}/{$nextPage}";
            $link = new Link($this->nextLabel, $href);
            $this->tag->addItem($link->render(), $options);
        }
        return $this;
    }
    
    public function render()
    {
        if ($this->pages) {
            $this->addPreviewsPage();
            $this->addAllPages();
            $this->addNextPage();
        }
        
        $this->nav->setContent($this->tag->render());
        return $this->nav->render();
    }
    
}
