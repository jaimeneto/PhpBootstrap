<?php

namespace PhpBootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * BootstrapTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class BootstrapTest extends PHPUnit
{
    private $html;

    protected function setUp()
    {
        $this->html = new Bootstrap();
    }
    
    public function testCreateDivUsingHtmlCall()
    {
        $div = $this->html->div();
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Component', $div);
        $this->assertEquals('div', $div->getTag());
    }
    
    public function testCreateAlert()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Alert', $this->html->alert());
    }
    
    public function testCreateBadge()
    {
        $this->assertEquals('<span class="badge">40</span>', $this->html->badge('40')->render());
    }
    
    public function testCreateLabel()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Label', $this->html->label());
    }
    
    public function testCreateJumbotron()
    {
        $this->assertEquals('<div class="jumbotron"></div>', $this->html->jumbotron()->render());
    }
    
    public function testCreateCaret()
    {
        $this->assertEquals('<span class="caret"></span>', $this->html->caret()->render());
    }
    
    public function testCreatePageHeader()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\PageHeader', $this->html->pageHeader('title'));
    }
    
    public function testCreatePageWell()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Well', $this->html->well());
    }
    
    public function testCreateGlyphicon()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Glyphicon', $this->html->glyphicon('user'));
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Glyphicon', $this->html->icon('plus'));
    }
    
    public function testCreatePanel()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Panel', $this->html->panel());
    }
    
    public function testCreateProgressBar()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\ProgressBar', $this->html->progressBar());
    }
    
    public function testCreateTabs()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Tabs', $this->html->tabs());
    }
    
    public function testCreatePills()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Pills', $this->html->pills());
    }
    
    public function testCreateBreadcrumbs()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Breadcrumbs', $this->html->breadcrumbs());
    }
    
    public function testCreatePagination()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Pagination', $this->html->pagination(10));
    }
    
    public function testCreateDropdown()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Dropdown', $this->html->dropdown('Dropdown'));
    }
    
    public function testCreateCarousel()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Carousel', $this->html->carousel());
    }
    
    public function testCreateListGroup()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\ListGroup', $this->html->listGroup());
    }
    
    public function testCreateModal()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Modal', $this->html->modal());
    }
    
    public function testCreateNav()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Nav', $this->html->nav());
    }
    
    public function testCreateNavbar()
    {
        $this->assertInstanceOf('\PhpBootstrap\Bootstrap\Navbar', $this->html->navbar());
    }
    
}
