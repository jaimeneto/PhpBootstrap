<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap NavbarTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class NavbarTest extends PHPUnit
{
    protected $navbar;
    
    protected function setUp()
    {
        $this->navbar = $navbar = new Navbar([
            ['content' => 'Home', 'href' => '/home', 'active' => true], 
            ['content' => 'Contact', 'href' => '/contact']
        ], ['id' => 'test']);
        $this->navbar->setHeader('Brand', '/home');
    }
    
    public function testRender()
    {
        $expected = '<nav class="navbar navbar-default">'
                  . '<div class="container-fluid">'
                  . '<div class="navbar-header">'
                  . '<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#test">'
                  . '<span class="sr-only">Toggle navigation</span>'
                  . '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>'
                  . '</button><a class="navbar-brand" href="/home">Brand</a></div>'
                  . '<div id="test" class="collapse navbar-collapse">'
                  . '<ul class="nav navbar-nav">'
                  . '<li class="active"><a href="/home">Home</a></li>'
                  . '<li><a href="/contact">Contact</a></li>'
                  . '</ul></div>'
                  . '</div></nav>';
        $this->assertEquals($expected, $this->navbar->render());
    }
    
    public function testInverse()
    {
        $this->navbar->inverse();
        $this->assertTrue($this->navbar->hasClass('navbar-inverse'));
        $this->assertFalse($this->navbar->hasClass('navbar-default'));
        
        $this->navbar->inverse(false);
        $this->assertFalse($this->navbar->hasClass('navbar-inverse'));
        $this->assertTrue($this->navbar->hasClass('navbar-default'));
    }
    
    public function testStaticTopFixedTopAndFixedBottom()
    {
        $this->navbar->staticTop();
        $this->assertTrue($this->navbar->hasClass('navbar-static-top'));
        
        $this->navbar->fixedTop();
        $this->assertFalse($this->navbar->hasClass('navbar-static-top'));
        $this->assertTrue($this->navbar->hasClass('navbar-fixed-top'));
        
        $this->navbar->fixedBottom();
        $this->assertFalse($this->navbar->hasClass('navbar-fixed-top'));
        $this->assertTrue($this->navbar->hasClass('navbar-fixed-bottom'));
    }
    
    public function testSetRightItems()
    {
        $this->navbar->setItems([
                ['content' => 'Profile', 'href' => '/profile'], 
                ['content' => 'Logout', 'href' => '/logout']
            ], null, true);
        $expected = '<nav class="navbar navbar-default">'
                  . '<div class="container-fluid">'
                  . '<div class="navbar-header">'
                  . '<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#test">'
                  . '<span class="sr-only">Toggle navigation</span>'
                  . '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>'
                  . '</button><a class="navbar-brand" href="/home">Brand</a></div>'
                  . '<div id="test" class="collapse navbar-collapse">'
                  . '<ul class="nav navbar-nav">'
                  . '<li class="active"><a href="/home">Home</a></li>'
                  . '<li><a href="/contact">Contact</a></li>'
                  . '</ul>'
                  . '<ul class="nav navbar-nav navbar-right">'
                  . '<li><a href="/profile">Profile</a></li>'
                  . '<li><a href="/logout">Logout</a></li>'
                  . '</ul>'
                  . '</div></div></nav>';
        $this->assertEquals($expected, $this->navbar->render());
    }
    
    public function testSetForm()
    {
        $this->navbar->setForm([
            [
                'element'     => 'text', 
                'name'        => 'search', 
                'placeholder' => 'Search'
            ], [
                'element'     => 'button', 
                'type'        => 'submit',
                'name'        => 'search_btn',
                'label'       => 'Search',
                'btnClass'    => 'default'
            ]
        ], [
            'role'  => 'search', 
            'class' => 'navbar-right'
        ], true);
        
        $expected = '<nav class="navbar navbar-default">'
                  . '<div class="container-fluid">'
                  . '<div class="navbar-header">'
                  . '<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#test">'
                  . '<span class="sr-only">Toggle navigation</span>'
                  . '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>'
                  . '</button><a class="navbar-brand" href="/home">Brand</a></div>'
                  . '<div id="test" class="collapse navbar-collapse">'
                  . '<ul class="nav navbar-nav">'
                  . '<li class="active"><a href="/home">Home</a></li>'
                  . '<li><a href="/contact">Contact</a></li>'
                  . '</ul>'
                  . '<form class="navbar-right navbar-form" method="post" role="search">'
                  . '<div class="form-group"><input id="form_search" class="form-control" name="search" type="text" placeholder="Search" /></div>'
                  . '<button id="form_search_btn" class="btn btn-default" name="search_btn" type="submit">Search</button></form>'
                  . '</div></div></nav>';
        $this->assertEquals($expected, $this->navbar->render());
    }
    
}
