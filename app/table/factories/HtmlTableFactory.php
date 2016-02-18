<?php

namespace App\Table;


class HtmlTableFactory implements ITableFactory
{
    private $cell;
    
    public function createCell()
    {
        if ($this->cell === \NULL) {
            $this->cell = new HtmlCell();            
        }
        
        return $this->cell;
    }
    
    
    public function createRow()
    {
        $row = new HtmlRow($this->createCell());
        return $row;
    }
    
    
    public function createTable()
    {
        return new HtmlTable();
    }
}