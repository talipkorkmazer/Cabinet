<?php

namespace App\Interfaces;

interface ShelfInterface
{
    public function add(ItemInterface $item): bool;

    public function remove(ItemInterface $item): bool;

    public function increaseAvailableSize(int $size): void;

    public function decreaseAvailableSize(int $size): void;

    public function getAvailableSize(): int;
}