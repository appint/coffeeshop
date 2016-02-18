<?php

namespace App\Table;


abstract class Cell
{    
    abstract public function show($content);
}