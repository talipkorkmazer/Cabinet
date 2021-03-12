<?php

namespace App\Classes\Items;

use App\Interfaces\ItemInterface;

require_once(__ROOT__ . '/Interfaces/ItemInterface.php');

abstract class Item implements ItemInterface
{
    protected int $size;

    public function getSize(): int
    {
        return $this->size;
    }
}