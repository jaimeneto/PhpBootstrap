<?php

namespace PhpBootstrap\Html;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * TableTest
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class TableTest extends PHPUnit
{
    
    public function testRender()
    {
        $table = new Table([['a', 'b', 'c'],['d', 'e', 'f']]);
        $expected = '<table class="table"><tbody>' 
                  . '<tr><td>a</td><td>b</td><td>c</td></tr>'
                  . '<tr><td>d</td><td>e</td><td>f</td></tr>'
                  . '</tbody></table>';
        $this->assertEquals($expected, $table->render());
    }
    
    public function testAddTheadAndTfoot()
    {
        $table = new Table();
        $table->addRow(['a', 'b', 'c'], 'tbody', ['id' => 'row1'])
              ->addRow(['d', 'e', 'f'], 'tbody', ['id' => 'row2'])
              ->addRow(['col1', 'col2', 'col3'], 'thead')
              ->addRow(['foot1', 'foot2', 'foot3'], 'tfoot');
        
        $expected = '<table class="table"><thead>' 
                  . '<tr><td>col1</td><td>col2</td><td>col3</td></tr>'
                  . '</thead><tbody>' 
                  . '<tr id="row1"><td>a</td><td>b</td><td>c</td></tr>'
                  . '<tr id="row2"><td>d</td><td>e</td><td>f</td></tr>'
                  . '</tbody><tfoot>' 
                  . '<tr><td>foot1</td><td>foot2</td><td>foot3</td></tr>'
                  . '</tfoot></table>';
        $this->assertEquals($expected, $table->render());
    }
    
    public function testAddTagObjectAsData()
    {
        $table = new Table();
        $table->addRow([
            new Tag('td', 'a', ['id' => 'tdA']), 
            $table->createTd('b', ['id' => 'tdB']),
            $table->createTd(new Tag('td', 'c'), ['id' => 'tdC']),
        ]);
        
        $expected = $expected = '<table class="table"><tbody>' 
                  . '<tr><td id="tdA">a</td><td id="tdB">b</td><td id="tdC">c</td></tr>'
                  . '</tbody></table>';
        $this->assertEquals($expected, $table->render());
    }
    
    public function testAddTagObjectAsRow()
    {
        $table = new Table();
        $tr = new Tag('tr', '<td>a</td><td>b</td>', ['id' => 'row1']);
        $table->addRow($tr, ['class' => 'even']);
        
        $expected = $expected = '<table class="table"><tbody>' 
                  . '<tr id="row1" class="even"><td>a</td><td>b</td></tr>'
                  . '</tbody></table>';
        $this->assertEquals($expected, $table->render());
    }
    
    public function testBootstrapMethods()
    {
        $table = new Table([['a', 'b', 'c']]);
        $table->striped()->bordered()->hover()->condensed()->responsive();
        
        $expected = '<div class="table-responsive">'
                  . '<table class="table table-striped table-bordered table-hover table-condensed"><tbody>' 
                  . '<tr><td>a</td><td>b</td><td>c</td></tr>'
                  . '</tbody></table></div>';
        $this->assertEquals($expected, $table->render());
    }
        
}
