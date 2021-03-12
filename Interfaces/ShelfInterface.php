<?php

namespace App\Interfaces;

interface ShelfInterface
{
    public function add(ItemInterface $item);

    public function remove(ItemInterface $item);

    public function increaseAvailableSize(int $size);

    public function decreaseAvailableSize(int $size);

    public function getAvailableSize();
}