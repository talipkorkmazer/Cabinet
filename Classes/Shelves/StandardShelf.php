<?php

namespace App\Classes\Shelves;

require_once(__ROOT__ . '/Classes/Shelves/Shelf.php');

class StandardShelf extends Shelf
{
    protected int $availableSize = 20;
}