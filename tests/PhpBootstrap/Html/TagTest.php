<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * TagTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class TagTest extends PHPUnit
{
    
    public function testTagWithContent()
    {
        $tag = new Tag('div', 'content text');
        $this->assertEquals('<div>content text</div>', $tag->render());
    }
    
    public function testTagWithEmptyContent()
    {
        $tag = new Tag('div', '');
        $this->assertEquals('<div></div>', $tag->render());
    }
    
    public function testEmptyTag()
    {
        $tag = new Tag('br');
        $this->assertEquals('<br />', $tag->render());
    }
    
    public function testTagWithAttribs()
    {
        $tag = new Tag('div', 'content text', ['id' => 'test', 'class' => ['text-center', 'bg-primary'], 'title' => 'teste']);
        $this->assertEquals('<div id="test" class="text-center bg-primary" title="teste">content text</div>', $tag->render());
    }
    
    public function testTagSetAndGetAttribs()
    {
        $tag = new Tag('div', 'content text');
        $attribs = ['id' => 'test', 'class' => ['text-center', 'bg-primary'], 'title' => 'teste'];
        $tag->setAttribs($attribs);
        $this->assertEquals($attribs, $tag->getAttribs());
    }
    
    public function testRemoveAttribAndGetInvalidAttrib()
    {
        $tag = new Tag('span');
        $tag->setAttrib('title', 'teste');
        $tag->removeAttrib('title');
        $tag->removeAttrib('other');
        $this->assertNull($tag->getAttrib('title'));
    }
    
    public function testTagMethods()
    {
        $tag = new Tag('span');
        $tag->id('test')
            ->setContent('content text')
            ->addClass('text-center')
            ->addClass('bg-primary');
        
        $this->assertEquals('span', $tag->getTag());
        $this->assertEquals('<span id="test" class="text-center bg-primary">content text</span>', (string) $tag);
    }
    
    public function testCssClasses()
    {
        $tag = new Tag('p', 'content text');
        $tag->setAttrib('class', 'lead')
            ->addClass('text-center bg-primary text-muted')
            ->removeClass('text-muted');
        
        $this->assertFalse($tag->hasClass('text-muted'));
        $this->assertEquals(['lead', 'text-center', 'bg-primary'], $tag->getClass());
        $this->assertEquals('<p class="lead text-center bg-primary">content text</p>', $tag->render());
    }
    
    public function testAppendPrependAndGetContent()
    {
        $tag = new Tag('p', 'content text');
        $tag->prepend('[')->append(']');
        $this->assertEquals('[content text]', $tag->getContent());
    }

    public function testConstructWithArrayOnFirstParameter()
    {
        $tag = new Tag(['tag' => 'div', 'content' => 'content text']);
        $this->assertEquals('<div>content text</div>', $tag->render());
    }

    public function testSetAriaAttrib()
    {
        $tag = new Tag(['tag' => 'div']);
        $tag->aria('hidden', 'true');
        $this->assertEquals('true', $tag->getAttrib('aria-hidden'));
    }
    
    public function testSetDataAttrib()
    {
        $tag = new Tag(['tag' => 'div']);
        $tag->data('foo', 'bar');
        $this->assertEquals('bar', $tag->getAttrib('data-foo'));
    }

    public function testSetStyle()
    {
        $tag = new Tag('p', 'content text', ['style' => 'height:auto;font-size:small;']);
        $tag->setStyle('width', '100%', 'background:gray')
            ->setStyle(['font-weight' => 'bold', 'color:black'])
            ->removeStyle('background');
        
        $expectedArray = [
            'height'      => 'auto', 
            'font-size'   => 'small', 
            'width'       => '100%', 
            'font-weight' => 'bold', 
            'color'       => 'black'
        ];
        
        $expectedString = '<p style="height:auto;font-size:small;width:100%;font-weight:bold;color:black">content text</p>';
        
        $this->assertEquals($expectedArray, $tag->getStyle());
        $this->assertEquals($expectedString, $tag->render());
    }
    
    public function testSetSrOnly()
    {
        $tag = new Tag('div', 'text');
        $tag->srOnly(true);
        
        $this->assertTrue($tag->hasClass('sr-only'));
        $this->assertTrue($tag->hasClass('sr-only-focusable'));
    }
    
}
