<?php

namespace App\Table;


abstract class Row
{
    protected $contents = [];
    protected $cell;


    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }
    
    
    public function addContent($content)
    {
        $this->contents[] = $content;
    }
    
    
    abstract public function show();
}