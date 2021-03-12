<?php

use App\Classes\Cabinet;
use App\Classes\Items\Coke;
use App\Classes\Shelves\StandardShelf;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('__ROOT__', dirname(__FILE__, 1));

require_once(__ROOT__ . '/Classes/Cabinet.php');
require_once(__ROOT__ . '/Classes/Shelves/StandardShelf.php');
require_once(__ROOT__ . '/Classes/Items/Coke.php');

$cabinet = new Cabinet();

$cabinet->addShelf(new StandardShelf());
$cabinet->addShelf(new StandardShelf());
$cabinet->addShelf(new StandardShelf());

try {
    $cabinet->addItem(new Coke());
    $cabinet->addItem(new Coke());
    $cabinet->addItem(new Coke());
} catch (Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "</pre>";
}

try {
    $cabinet->removeItem(new Coke());
    $cabinet->removeItem(new Coke());
} catch (Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "</pre>";
}


echo "<pre>";
print_r($cabinet);
echo "</pre>";

echo "<pre>";
print_r($cabinet->getAvailableSize());
echo "</pre>";

echo "<pre>";
var_dump($cabinet->getDoorIsOpen());
echo "</pre>";

$cabinet->setDoorIsOpen(true);

echo "<pre>";
var_dump($cabinet->getDoorIsOpen());
echo "</pre>";

die("END!!!");
