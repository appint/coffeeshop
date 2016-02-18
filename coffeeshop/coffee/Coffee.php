<?php

namespace CoffeeShop;


class Coffee
{
    protected $volume;


    public function __construct($volume)
    {
        $this->volume = $volume;
    }
    
    
    public function getVolume()
    {
        return $this->volume;
    }
}