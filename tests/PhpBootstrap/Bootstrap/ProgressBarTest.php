<?php

namespace PhpBootstrap\Bootstrap;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * Bootstrap ProgressBarTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class ProgressBarTest extends PHPUnit
{
    
    public function testRender()
    {
        $bar = new ProgressBar(50);
        $expected = '<div class="progress"><div class="progress-bar" ' 
                  . 'style="width:50%" role="progressbar" aria-valuenow="50" ' 
                  . 'aria-valuemin="0" aria-valuemax="100"></div></div>';
        $this->assertEquals($expected, $bar->render());
    }
    
    public function testSetContent()
    {
        $bar = new ProgressBar(50, '50%');
        $expected = '<div class="progress"><div class="progress-bar" ' 
                  . 'style="width:50%" role="progressbar" aria-valuenow="50" ' 
                  . 'aria-valuemin="0" aria-valuemax="100">50%</div></div>';
        $this->assertEquals($expected, $bar->render());
    }
    
    public function testSetStyle()
    {
        $bar = new ProgressBar(50, '50%');
        $bar->progressBarStyle('success');
        $this->assertTrue($bar->hasClass('progress-bar-success'));
        $bar->progressBarStyle();
        $this->assertFalse($bar->hasClass('progress-bar-success'));
    }
    
    
    
}
