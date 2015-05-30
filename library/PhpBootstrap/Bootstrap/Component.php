<?php

namespace PhpBootstrap\Bootstrap;

use PhpBootstrap\Html\Tag;


/**
 * Tag
 *
 * Creates an HTML tag
 * 
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Component
{    
    /**
     * @var \PhpBootstrap\Html\Tag
     */
    protected $tag;
    
    /**
     * 
     * @param \PhpBootstrap\Html\Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }
    
    public function __call($name, $arguments)
    {
        $result = call_user_func_array([$this->tag, $name], $arguments);
        if ($result instanceof Tag) {
            return $this;
        }
        return $result;
    }
    
    ################################## BLOCK ##################################
    
    public function center()
    {
        $this->tag->removeClass(['pull-left', 'pull-right']);
        $this->tag->addClass('center-block');
        return $this;
    }

    public function pullLeft()
    {
        $this->tag->removeClass(['center-block', 'pull-right']);
        $this->tag->addClass('pull-left');
        return $this;
    }
    
    public function pullRight()
    {
        $this->tag->removeClass(['center-block', 'pull-left']);
        $this->tag->addClass('pull-right');
        return $this;
    }
    
    public function clearfix()
    {
        $this->tag->addClass('clearfix');
        return $this;
    }

    public function show()
    {
        $this->tag->removeClass(['hidden', 'invisible']);
        $this->tag->addClass('show');
        return $this;
    }
    
    public function hidden()
    {
        $this->tag->removeClass(['show', 'invisible']);
        $this->tag->addClass('hidden');
        return $this;
    }
    
    public function invisible()
    {
        $this->tag->removeClass(['hidden', 'show']);
        $this->tag->addClass('invisible');
        return $this;
    }
    
    ################################ BACKGROUND ################################
    
    public function setBackground($bg)
    {
        $bgClasses = [
            'bg-primary',
            'bg-success',
            'bg-info',
            'bg-warning',
            'bg-danger'
        ];
        $bgClass = "bg-{$bg}";
        $this->tag->removeClass($bgClasses);
        if (in_array($bgClass, $bgClasses)) {
            $this->tag->addClass($bgClass);
        }
        return $this;
    }
    
    public function bgPrimary()
    {
        return $this->setBackground('primary');
    }
    
    public function bgSuccess()
    {
        return $this->setBackground('success');
    }
    
    public function bgInfo()
    {
        return $this->setBackground('info');
    }
    
    public function bgWarning()
    {
        return $this->setBackground('warning');
    }
    
    public function bgDanger()
    {
        return $this->setBackground('danger');
    }

    ################################## OTHER ##################################
    
    /**
     * 
     * @param string $title
     * @param string $placement left|right|top|bottom
     * @return \PhpBootstrap\Html\Tag
     */
    public function tooltip($title, $placement = 'left')
    {
        $this->tag->data('toggle', 'tooltip')
                  ->data('placement', $placement)
                  ->setAttrib('title', $title);
        return $this;
    }
    
    ################################### TEXT ###################################
    
    public function textAlign($align)
    {
        $textAlignClasses = [
            'text-right',
            'text-left',
            'text-center',
            'text-justify'
        ];
        
        $alignClass = "text-{$align}";
        $this->tag->removeClass($textAlignClasses);
        if (in_array($alignClass, $textAlignClasses)) {
            $this->tag->addClass($alignClass);
        }
        return $this;
    }
    
    public function textTransform($transform)
    {
        $textTransformationClasses = [
            'text-lowercase',
            'text-uppercase',
            'text-capitalize'
        ];
        
        $transformClass = "text-{$transform}";
        $this->tag->removeClass($textTransformationClasses);
        if (in_array($transformClass, $textTransformationClasses)) {
            $this->tag->addClass($transformClass);
        }
        return $this;
    }
    
    public function textStyle($style)
    {
        $textStyleClasses = [
            'text-hide',
            'text-muted',
            'text-primary',
            'text-success',
            'text-info',
            'text-warning',
            'text-danger'
        ];
        
        $styleClass = "text-{$style}";
        $this->tag->removeClass($textStyleClasses);
        if (in_array($styleClass, $textStyleClasses)) {
            $this->tag->addClass($styleClass);
        }
        return $this;
    }
    
    public function textRight()
    {
        return $this->textAlign('right');
    }

    public function textLeft()
    {
        return $this->textAlign('left');
    }

    public function textCenter()
    {
        return $this->textAlign('center');
    }

    public function textJustify()
    {
        return $this->textAlign('justify');
    }

    public function textNoWrap()
    {
        return $this->tag->addClass('text-nowrap');
    }

    public function lead()
    {
        return $this->tag->addClass('lead');
    }
    
    public function small()
    {
        return $this->tag->addClass('small');
    }
    
    public function lowercase()
    {
        return $this->textTransform('lowercase');
    }

    public function uppercase()
    {
        return $this->textTransform('uppercase');
    }
    
    public function capitalize()
    {
        return $this->textTransform('capitalize');
    }
    
    public function textHide()
    {
        return $this->textStyle('hide');
    }
    
    public function textMuted()
    {
        return $this->textStyle('muted');
    }
    
    public function textPrimary()
    {
        return $this->textStyle('primary');
    }
    
    public function textSuccess()
    {
        return $this->textStyle('success');
    }
    
    public function textInfo()
    {
        return $this->textStyle('info');
    }
    
    public function textWarning()
    {
        return $this->textStyle('warning');
    }
    
    public function textDanger()
    {
        return $this->textStyle('danger');
    }
    
    ################################ VISIBILITY ################################
    
    /**
     * 
     * @param string $device xs|sm|md|lg|print
     * @param string $type   block|inline|inline-block|print
     * @return \PhpBootstrap\Html\Form\Element
     */
    public function setVisibility($device, $type = 'block')
    {
        if (!in_array($device, array('xs', 'sm', 'md', 'lg', 'print'))) {
            return $this;
        }
        if (!in_array($type, array('block', 'inline', 'inline-block', 'hidden'))) {
            return $this;
        }
        
        $classes = $this->tag->getClass();
        foreach($classes as $class) {
            if (strstr($class, "visible-{$device}") 
                    || $class == "hidden-{$device}") {
                $this->tag->removeClass($class);
            }
        }
        
        if ($type == 'hidden') {
            $this->tag->addClass("hidden-{$device}");
        } else {
            $this->tag->addClass("visible-{$device}-{$type}");
        }
                
        return $this;
    }
    
    /**
     * Alias for visibleXsBlock()
     */
    public function visibleXs()
    {
        return $this->visibleXsBlock();
    }
    
    public function visibleXsBlock()
    {
        return $this->setVisibility('xs', 'block');
    }
    
    public function visibleXsInline()
    {
        return $this->setVisibility('xs', 'inline');
    }
    
    public function visibleXsInlineBlock()
    {
        return $this->setVisibility('xs', 'inline-block');
    }
    
    public function hiddenXs()
    {
        return $this->setVisibility('xs', 'hidden');
    }
    
    /**
     * Alias for visibleSmBlock()
     */
    public function visibleSm()
    {
        return $this->visibleSmBlock();
    }
    
    public function visibleSmBlock()
    {
        return $this->setVisibility('sm', 'block');
    }
    
    public function visibleSmInline()
    {
        return $this->setVisibility('sm', 'inline');
    }
    
    public function visibleSmInlineBlock()
    {
        return $this->setVisibility('sm', 'inline-block');
    }
    
    public function hiddenSm()
    {
        return $this->setVisibility('sm', 'hidden');
    }
    
    /**
     * Alias for visibleMdBlock()
     */
    public function visibleMd()
    {
        return $this->visibleMdBlock();
    }
    
    public function visibleMdBlock()
    {
        return $this->setVisibility('md', 'block');
    }
    
    public function visibleMdInline()
    {
        return $this->setVisibility('md', 'inline');
    }
    
    public function visibleMdInlineBlock()
    {
        return $this->setVisibility('md', 'inline-block');
    }
    
    public function hiddenMd()
    {
        return $this->setVisibility('md', 'hidden');
    }
    
    /**
     * Alias for visibleLgBlock()
     */
    public function visibleLg()
    {
        return $this->visibleLgBlock();
    }
    
    public function visibleLgBlock()
    {
        return $this->setVisibility('lg', 'block');
    }
    
    public function visibleLgInline()
    {
        return $this->setVisibility('lg', 'inline');
    }
    
    public function visibleLgInlineBlock()
    {
        return $this->setVisibility('lg', 'inline-block');
    }
    
    public function hiddenLg()
    {
        return $this->setVisibility('lg', 'hidden');
    }
    
    /**
     * Alias for visiblePrintBlock()
     */
    public function visiblePrint()
    {
        return $this->visiblePrintBlock();
    }
    
    public function visiblePrintBlock()
    {
        return $this->setVisibility('print', 'block');
    }
    
    public function visiblePrintInline()
    {
        return $this->setVisibility('print', 'inline');
    }
    
    public function visiblePrintInlineBlock()
    {
        return $this->setVisibility('print', 'inline-block');
    }
    
    public function hiddenPrint()
    {
        return $this->setVisibility('print', 'hidden');
    }
    
    public function render()
    {
        return $this->tag->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
