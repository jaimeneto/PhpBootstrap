<?php

namespace PhpBootstrap\Html;

use ArrayObject;

/**
 * Table
 * 
 * Creates an HTML table
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Table extends Tag
{
    /**
     *
     * @var array
     */
    protected $rows = [
        'thead' => [],
        'tbody' => [],
        'tfoot' => [],
    ];    
    
    protected $responsive = false;
    
    /**
     * 
     * @param array $rows
     * @param mixed $options
     */
    public function __construct($rows = null, $options = null)
    {
        if ($rows) {
            $options['rows'] = $rows;
        }
        
        parent::__construct('table', '', $options);
        $this->addClass('table');
    }
    
    /**
     * 
     * @param array $rows
     * @param string $part tbody|thead|tfoot
     * @return \PhpBootstrap\Html\Table
     */
    public function setRows(array $rows, $part = 'tbody')
    {
        foreach($rows as $row) {
            $this->addRow($row, $part);
        }
        return $this;
    }
    
    /**
     * 
     * @param mixed $row
     * @param mixed $part
     * @param array $options
     * @return \PhpBootstrap\Html\Table
     */
    public function addRow($row, $part = 'tbody', array $options = null)
    {
        if (is_array($part) && $options === null) {
            $options = $part;
            $part = 'tbody';
        }
        
        if (($row instanceof Tag) && $row->getTag() == 'tr') {
            if ($options) {
                $row->setOptions($options);
            }
            $tr = $row;
        } elseif (is_array($row)) {
            $tr = new Tag('tr', '', $options);
            foreach($row as $data) {
                $td = $this->createTd($data);
                $tr->append($td->render());
            }
        }
        
        $this->rows[$part][] = $tr;
        
        return $this;
    }
    
    /**
     * 
     * @param mixed $content
     * @param array $options
     * @return \PhpBootstrap\Html\Tag
     */
    public function createTd($content, $options = null)
    {
        if (($content instanceof Tag) && $content->getTag() == 'td') {
            if ($options) {
                $content->setOptions($options);
            }
            $td = $content;
        } else {
            $td = new Tag('td', $content, $options);
        }
        
        return $td;
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Table
     */
    public function striped($bool = true)
    {
        return $bool
                ? $this->addClass('table-striped')
                : $this->removeClass('table-striped');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Table
     */
    public function bordered($bool = true)
    {
        return $bool
                ? $this->addClass('table-bordered')
                : $this->removeClass('table-bordered');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Table
     */
    public function hover($bool = true)
    {
        return $bool
                ? $this->addClass('table-hover')
                : $this->removeClass('table-hover');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Table
     */
    public function condensed($bool = true)
    {
        return $bool
                ? $this->addClass('table-condensed')
                : $this->removeClass('table-condensed');
    }
    
    /**
     * 
     * @param boolean $bool
     * @return \PhpBootstrap\Html\Table
     */
    public function responsive($bool = true)
    {
        $this->responsive = (bool) $bool;
        return $this;
    }
    
    public function render()
    {
        if ($this->rows) {
            $parts = ['thead', 'tbody', 'tfoot'];
            foreach($parts as $part) {
                if ($this->rows[$part]) {
                    $partTag = new Tag($part, '');
                    foreach($this->rows[$part] as $tr) {
                        $partTag->append($tr->render());
                    }
                    $this->append($partTag->render());
                }
            }
        }

        $html = '';
        if ($this->responsive) {
            $table = new Tag('div', parent::render(), 
                             ['class' => 'table-responsive']);
            $html = $table->render();
        } else {
            $html = parent::render();
        }
        
        return $html;
    }
    
}
