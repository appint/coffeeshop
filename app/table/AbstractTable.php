<?php

namespace App\Table;


abstract class Table
{
    protected $rows = [];
    
    
    public function addRow(Row $row)
    {
        $this->rows[] = $row;
    }
    
    
    abstract public function show();
}