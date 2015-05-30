<?php

namespace PhpBootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * HtmlTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class HtmlTest extends PHPUnit
{
    private $html;

    protected function setUp()
    {
        $this->html = new Html();
    }
    
    public function testCreateTag()
    {
        $small = $this->html->tag('small', 'text', ['id' => 'sm']);
        $this->assertInstanceOf('\PhpBootstrap\Html\Tag', $small);
        $this->assertEquals('<small id="sm">text</small>', $small->render());
    }
    
    public function testCall()
    {
        $strong = $this->html->strong('text', ['id' => 'sm']);
        $this->assertInstanceOf('\PhpBootstrap\Html\Tag', $strong);
        $this->assertEquals('<strong id="sm">text</strong>', $strong->render());
    }
    
    
    public function testCreateDiv()
    {
        $this->assertEquals('div', $this->html->div()->getTag());
    }
    
    public function testCreateSpan()
    {
        $this->assertEquals('span', $this->html->span()->getTag());
    }
    
    public function testCreateImg()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Img', $this->html->img('/img/favicon.png'));
    }
    
    public function testCreateOl()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Ol', $this->html->ol());
    }
    
    public function testCreateUl()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Ul', $this->html->ul());
    }
    
    public function testCreateDl()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Dl', $this->html->dl());
    }
    
    public function testCreateForm()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Form', $this->html->form());
    }

    public function testCreateLink()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Link', $this->html->link());
        $this->assertInstanceOf('\PhpBootstrap\Html\Link', $this->html->a());
    }
    
    public function testCreateFieldset()
    {
        $this->assertInstanceOf('\PhpBootstrap\Html\Fieldset', $this->html->fieldset());
    }
    
}
