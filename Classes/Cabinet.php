<?php

namespace App\Classes;

use App\Interfaces\ItemInterface;
use App\Interfaces\ShelfInterface;

class Cabinet
{
    private array $shelves = [];

    private bool $doorIsOpen = false;

    public function addShelf(ShelfInterface $shelf): void
    {
        $this->shelves[] = $shelf;
    }

    public function addItem(ItemInterface $item): bool
    {
        if (count($this->shelves) === 0) {
            throw new \RuntimeException('There is no shelf.');
        }

        /** @var $shelf ShelfInterface */
        foreach ($this->shelves as $shelf) {
            if (($shelf->getAvailableSize() > 0) && $shelf->add($item)) {
                return true;
            }
        }

        throw new \OverflowException('There is not enough free space in the Cabinet.');
    }

    public function removeItem(ItemInterface $item): bool
    {
        if (count($this->shelves) === 0) {
            throw new \UnderflowException('There is no shelf.');
        }

        /** @var $shelf ShelfInterface */
        foreach ($this->shelves as $shelf) {
            if ($shelf->getAvailableSize() > 0) {
                try {
                    if ($shelf->remove($item)) {
                        return true;
                    }
                } catch(\Throwable $e) {
                    return false;
                }
            }
        }

        return false;
    }

    public function getAvailableSize(): int
    {
        $size = 0;
        if (count($this->shelves) === 0) {
            return $size;
        }

        /** @var $self ShelfInterface */
        foreach ($this->shelves as $self) {
            $size += $self->getAvailableSize();
        }

        return $size;
    }

    public function getDoorIsOpen(): bool
    {
        return $this->doorIsOpen;
    }

    public function setDoorIsOpen(bool $isOpen): void
    {
        $this->doorIsOpen = $isOpen;
    }
}