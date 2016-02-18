<?php

namespace App\Table;


interface ITableFactory
{
    public function createCell();
    public function createRow();
    public function createTable();
}