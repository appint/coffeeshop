<?php

namespace CoffeeShop;

use App\Table\ITableFactory,
    App\IMapGen;


class SquareTable extends AbstractTable
{    
    public function __construct(
            ITableFactory $tf,
            IMapGen $mapGen,
            $length,
            $width
    ){
        if ($length != $width) {
            throw new \Exception;
        }
        parent::__construct($tf, $mapGen, $length, $width); 
    }
}