<?php

require_once (__DIR__.'/app/table/factories/ITableFactory.php');
require_once (__DIR__.'/app/table/factories/HtmlTableFactory.php');
require_once (__DIR__.'/app/table/AbstractTable.php');
require_once (__DIR__.'/app/table/AbstractRow.php');
require_once (__DIR__.'/app/table/AbstractCell.php');
require_once (__DIR__.'/app/table/html/HtmlTable.php');
require_once (__DIR__.'/app/table/html/HtmlRow.php');
require_once (__DIR__.'/app/table/html/HtmlCell.php');
require_once (__DIR__.'/app/mapgens/IMapGen.php');
require_once (__DIR__.'/app/mapgens/RandomMapGen.php');
require_once (__DIR__.'/coffeeshop/table/AbstractTable.php');
require_once (__DIR__.'/coffeeshop/table/SquareTable.php');
require_once (__DIR__.'/coffeeshop/barman/IBarman.php');
require_once (__DIR__.'/coffeeshop/barman/Barman.php');
require_once (__DIR__.'/coffeeshop/coffee/Coffee.php');
require_once (__DIR__.'/app/finder/Finder.php');

use App\Table\HtmlTableFactory,
    App\RandomMapGen,
    App\Finder,
    CoffeeShop\SquareTable,
    Coffeeshop\Barman,
    CoffeeShop\Coffee;

$tf = new HtmlTableFactory();
$randomMapGen = new RandomMapGen();
$barman = new Barman();
$coffee = new Coffee(40);

try {
    $table = new SquareTable($tf, $randomMapGen, 10, 10);
} catch (Exception $exc) {
    echo 'Upsss';
}

$dirtyTable = $barman->spill($coffee, $table);
$dirtyTable->getTable();

$finder = new Finder();
$cleanTable = $barman->clean($dirtyTable, $finder);
$execution = $barman->getExecution($cleanTable);
$execution->getTable();