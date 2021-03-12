<?php

namespace App\Classes\Items;

require_once(__ROOT__ . '/Classes/Items/Item.php');

class Coke extends Item
{
    protected int $size = 1;
}