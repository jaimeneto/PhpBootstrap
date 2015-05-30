<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Bootstrap\Component;
use PhpBootstrap\Html\Tag;

/**
 * Bootstrap Modal
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Modal extends Component
{
    protected $modalDialog;
    protected $modalContent;
    protected $modalHeader;
    protected $modalBody;
    protected $modalFooter;
    
    /**
     * 
     * @param string $body
     * @param array $options
     */
    public function __construct($body = '', $options = null)
    {
        $header = '';
        if ($options && is_string($options)) {
            $header = $options;
            $options = [];
        }
        
        if (isset($options['header'])) {
            $header = $options['header'];
            unset($options['header']);
        }
        
        $this->modalDialog  = new Tag('div', '', ['class' => 'modal-dialog']);
        $this->modalContent = new Tag('div', '', ['class' => 'modal-content']);
        $this->modalHeader  = new Tag('div', '', ['class' => 'modal-header']);
        $this->modalBody    = new Tag('div', '', ['class' => 'modal-body']);
        $this->modalFooter  = new Tag('div', '', ['class' => 'modal-footer']);
                
        parent::__construct(new Tag('div', $body, $options));
        
        $this->tag->addClass('modal');
        $this->tag->setAttrib('role', 'dialog');
        $this->tag->aria('hidden', 'true');
        
        $this->fade(true);
        $this->header($header);
    }
    
    public function getModalDialog()
    {
        return $this->modalDialog;
    }

    public function getModalHeader()
    {
        return $this->modalHeader;
    }

    public function getModalFooter()
    {
        return $this->modalFooter;
    }

    public function header($content = '', $titleTag = 'h4', $dismissible = true)
    {
        if ($titleTag) {
            $title = new Tag($titleTag, $content, ['class' => 'modal-title']);
            if ($this->getAttrib('id')) {
                $titleLabel = $this->getAttrib('id') . 'Label';
                $title->setAttrib('id', $titleLabel);
                $this->aria('labelledby', $titleLabel);
            }
            $content = $title->render();
        }
        
        $this->modalHeader->setContent($content);
        
        if ($dismissible) {
            $closeLabel = is_string($dismissible) 
                        ? ' aria-label="' . $dismissible . '"' 
                        : '';
            $this->modalHeader->prepend('<button type="button" class="close" ' 
                    . 'data-dismiss="modal"' . $closeLabel . '>' 
                    . '<span aria-hidden="true">&times;</span></button>');
        }
        
        return $this;
    }
    
    public function footer($content = null)
    {
        $this->modalFooter->setContent($content);
        return $this;
    }
    
    public function fade($bool = true)
    {
        return $bool 
                ? $this->tag->addClass('fade') 
                : $this->tag->removeClass('fade');
    }
    
    /**
     * 
     * @param string $size lg|sm
     * @return Well
     */
    public function size($size)
    {
        $sizes = ['modal-lg', 'modal-sm'];
        $this->modalDialog->removeClass($sizes);
        $sizeClass = "modal-{$size}";
        if (in_array($sizeClass, $sizes)) {
            $this->modalDialog->addClass($sizeClass);
        }
        return $this;
    }
    
    /**
     * 
     * @return Well
     */
    public function large()
    {
        return $this->size('lg');
    }
    
    /**
     * 
     * @return Well
     */
    public function small()
    {
        return $this->size('sm');
    }
    
    public function render()
    {
        $this->modalContent->append($this->modalHeader->render());
        $this->modalBody->setContent($this->getContent());
        $this->modalContent->append($this->modalBody->render());
        if ($this->modalFooter->getContent()) {
            $this->modalContent->append($this->modalFooter->render());
        }
        
        $this->modalDialog->setContent($this->modalContent->render());
        $this->tag->setContent($this->modalDialog->render());
        
        return $this->tag->render();
    }
    
}
