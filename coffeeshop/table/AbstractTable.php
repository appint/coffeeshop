<?php

namespace CoffeeShop;


abstract class AbstractTable
{
    protected $factory;
    protected $mapGen;
    protected $length;
    protected $width;
    protected $map;


    public function __construct($tf, $mapGen, $length, $width)
    {        
        $this->factory = $tf;
        $this->mapGen = $mapGen;
        $this->length = $length;
        $this->width = $width; 
        $this->map = $this->generateMap();
    }
    
    
    public function getTable()
    {        
        $table = $this->factory->createTable();        
        foreach ($this->map as $items) {
            $row = $this->factory->createRow();
            $table->addRow($row);
            foreach ($items as $content) {
                $row->addContent($content);               
            }
        }         
        $table->show();        
    }
    
    
    public function getSize()
    {
        return $this->length * $this->width;
    }
    
    
    public function getMap()
    {
        return $this->map;
    }
    
    
    public function updateMap($map)
    {
        $this->map = $map;   
    }
    
    
    public function getLength()
    {
        return $this->length;
    }
    
    
    public function getWidth()
    {
        return $this->width;
    }
    
    
    public function generateMap($volume = 0)
    {
        $map = $this->mapGen->generate([
                'length' => $this->length,
                'width' => $this->width,
                'count' => $volume            
            ]
        ); 
        
        return $map;
    }
}