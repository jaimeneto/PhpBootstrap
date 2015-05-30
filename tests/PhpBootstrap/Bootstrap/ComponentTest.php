<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use PhpBootstrap\Html\Tag;

/**
 * Bootstrap ComponentTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ComponentTest extends PHPUnit
{
    private $component;
    
    protected function setUp()
    {
        $this->component = new Component(new Tag('p', 'Text'));
    }
    
    public function testCenterPullLeftAndPullRight()
    {
        $this->component->center();
        $this->assertTrue($this->component->hasClass('center-block'));
        
        $this->component->pullLeft();
        $this->assertFalse($this->component->hasClass('center-block'));
        $this->assertTrue($this->component->hasClass('pull-left'));
        
        $this->component->pullRight();
        $this->assertFalse($this->component->hasClass('pull-left'));
        $this->assertTrue($this->component->hasClass('pull-right'));
    }
    
    public function testClearfix()
    {
        $this->component->clearfix();
        $this->assertTrue($this->component->hasClass('clearfix'));
    }
    
    public function testShowHiddenAndInvisible()
    {
        $this->component->show();
        $this->assertTrue($this->component->hasClass('show'));
        
        $this->component->hidden();
        $this->assertFalse($this->component->hasClass('show'));
        $this->assertTrue($this->component->hasClass('hidden'));
        
        $this->component->invisible();
        $this->assertFalse($this->component->hasClass('hidden'));
        $this->assertTrue($this->component->hasClass('invisible'));
    }
    
    public function testSetBackground()
    {
        $this->component->bgPrimary();
        $this->assertTrue($this->component->hasClass('bg-primary'));
        
        $this->component->bgSuccess();
        $this->assertFalse($this->component->hasClass('bg-primary'));
        $this->assertTrue($this->component->hasClass('bg-success'));
        
        $this->component->bgInfo();
        $this->assertFalse($this->component->hasClass('bg-success'));
        $this->assertTrue($this->component->hasClass('bg-info'));
        
        $this->component->bgWarning();
        $this->assertFalse($this->component->hasClass('bg-info'));
        $this->assertTrue($this->component->hasClass('bg-warning'));
        
        $this->component->bgDanger();
        $this->assertFalse($this->component->hasClass('bg-warning'));
        $this->assertTrue($this->component->hasClass('bg-danger'));
    }
    
    public function testTooltip()
    {
        $this->component->tooltip('This is a tooltip');
        $expected = '<p data-toggle="tooltip" data-placement="left" title="This is a tooltip">Text</p>';
        $this->assertEquals($expected, $this->component->render());
    }    
    
    public function testTextAlign()
    {
        $this->component->textRight();
        $this->assertTrue($this->component->hasClass('text-right'));
        
        $this->component->textLeft();
        $this->assertFalse($this->component->hasClass('text-right'));
        $this->assertTrue($this->component->hasClass('text-left'));
        
        $this->component->textCenter();
        $this->assertFalse($this->component->hasClass('text-left'));
        $this->assertTrue($this->component->hasClass('text-center'));
        
        $this->component->textJustify();
        $this->assertFalse($this->component->hasClass('text-center'));
        $this->assertTrue($this->component->hasClass('text-justify'));
    }
    
    public function testTextTransform()
    {
        $this->component->lowercase();
        $this->assertTrue($this->component->hasClass('text-lowercase'));
        
        $this->component->uppercase();
        $this->assertFalse($this->component->hasClass('text-lowercase'));
        $this->assertTrue($this->component->hasClass('text-uppercase'));
        
        $this->component->capitalize();
        $this->assertFalse($this->component->hasClass('text-uppercase'));
        $this->assertTrue($this->component->hasClass('text-capitalize'));
    }
    
    public function testTextStyle()
    {
        $this->component->textHide();
        $this->assertTrue($this->component->hasClass('text-hide'));
        
        $this->component->textMuted();
        $this->assertFalse($this->component->hasClass('text-hide'));
        $this->assertTrue($this->component->hasClass('text-muted'));
        
        $this->component->textPrimary();
        $this->assertFalse($this->component->hasClass('text-muted'));
        $this->assertTrue($this->component->hasClass('text-primary'));
        
        $this->component->textSuccess();
        $this->assertFalse($this->component->hasClass('text-primary'));
        $this->assertTrue($this->component->hasClass('text-success'));
        
        $this->component->textInfo();
        $this->assertFalse($this->component->hasClass('text-success'));
        $this->assertTrue($this->component->hasClass('text-info'));
        
        $this->component->textWarning();
        $this->assertFalse($this->component->hasClass('text-info'));
        $this->assertTrue($this->component->hasClass('text-warning'));
        
        $this->component->textDanger();
        $this->assertFalse($this->component->hasClass('text-warning'));
        $this->assertTrue($this->component->hasClass('text-danger'));        
    }

    public function testNoWrap()
    {
        $this->component->textNoWrap();
        $this->assertTrue($this->component->hasClass('text-nowrap'));
    }

    public function testLead()
    {
        $this->component->lead();
        $this->assertTrue($this->component->hasClass('lead'));
    }

    public function testSmall()
    {
        $this->component->small();
        $this->assertTrue($this->component->hasClass('small'));
    }
    
    public function testSetVisibilityForPrint()
    {
        $this->component->visiblePrint();
        $this->assertTrue($this->component->hasClass('visible-print-block'));
        
        $this->component->visiblePrintInline();
        $this->assertFalse($this->component->hasClass('visible-print-block'));
        $this->assertTrue($this->component->hasClass('visible-print-inline'));
        
        $this->component->visiblePrintInlineBlock();
        $this->assertFalse($this->component->hasClass('visible-print-inline'));
        $this->assertTrue($this->component->hasClass('visible-print-inline-block'));
        
        $this->component->hiddenPrint();
        $this->assertFalse($this->component->hasClass('visible-print-inline-block'));
        $this->assertTrue($this->component->hasClass('hidden-print'));
    }
    
    public function testSetVisibilityForExtraSmallDevices()
    {
        $this->component->visibleXs();
        $this->assertTrue($this->component->hasClass('visible-xs-block'));
        
        $this->component->visibleXsInline();
        $this->assertFalse($this->component->hasClass('visible-xs-block'));
        $this->assertTrue($this->component->hasClass('visible-xs-inline'));
        
        $this->component->visibleXsInlineBlock();
        $this->assertFalse($this->component->hasClass('visible-xs-inline'));
        $this->assertTrue($this->component->hasClass('visible-xs-inline-block'));
        
        $this->component->hiddenXs();
        $this->assertFalse($this->component->hasClass('visible-xs-inline-block'));
        $this->assertTrue($this->component->hasClass('hidden-xs'));
    }
    
    public function testSetVisibilityForSmallDevices()
    {
        $this->component->visibleSm();
        $this->assertTrue($this->component->hasClass('visible-sm-block'));
        
        $this->component->visibleSmInline();
        $this->assertFalse($this->component->hasClass('visible-sm-block'));
        $this->assertTrue($this->component->hasClass('visible-sm-inline'));
        
        $this->component->visibleSmInlineBlock();
        $this->assertFalse($this->component->hasClass('visible-sm-inline'));
        $this->assertTrue($this->component->hasClass('visible-sm-inline-block'));
        
        $this->component->hiddenSm();
        $this->assertFalse($this->component->hasClass('visible-sm-inline-block'));
        $this->assertTrue($this->component->hasClass('hidden-sm'));
    }
    
    public function testSetVisibilityForMediumDevices()
    {
        $this->component->visibleMd();
        $this->assertTrue($this->component->hasClass('visible-md-block'));
        
        $this->component->visibleMdInline();
        $this->assertFalse($this->component->hasClass('visible-md-block'));
        $this->assertTrue($this->component->hasClass('visible-md-inline'));
        
        $this->component->visibleMdInlineBlock();
        $this->assertFalse($this->component->hasClass('visible-md-inline'));
        $this->assertTrue($this->component->hasClass('visible-md-inline-block'));
        
        $this->component->hiddenMd();
        $this->assertFalse($this->component->hasClass('visible-md-inline-block'));
        $this->assertTrue($this->component->hasClass('hidden-md'));
    }
    
    public function testSetVisibilityForLargeDevices()
    {
        $this->component->visibleLg();
        $this->assertTrue($this->component->hasClass('visible-lg-block'));
        
        $this->component->visibleLgInline();
        $this->assertFalse($this->component->hasClass('visible-lg-block'));
        $this->assertTrue($this->component->hasClass('visible-lg-inline'));
        
        $this->component->visibleLgInlineBlock();
        $this->assertFalse($this->component->hasClass('visible-lg-inline'));
        $this->assertTrue($this->component->hasClass('visible-lg-inline-block'));
        
        $this->component->hiddenLg();
        $this->assertFalse($this->component->hasClass('visible-lg-inline-block'));
        $this->assertTrue($this->component->hasClass('hidden-lg'));
    }
    
}
