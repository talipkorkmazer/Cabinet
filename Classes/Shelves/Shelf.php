<?php

namespace App\Classes\Shelves;

require_once(__ROOT__ . '/Interfaces/ShelfInterface.php');

use App\Interfaces\ItemInterface;
use App\Interfaces\ShelfInterface;

abstract class Shelf implements ShelfInterface
{
    protected int $availableSize;

    private array $items = [];

    public function add(ItemInterface $item): bool
    {
        if ($this->availableSize === 0) {
            return false;
        }

        $this->items[] = $item;
        $this->decreaseAvailableSize($item->getSize());
        return true;
    }

    public function remove(ItemInterface $item): bool
    {
        if (count($this->items) === 0) {
            throw new \UnderflowException('There is no shelf');
        }

        /** @var $currentItem ItemInterface */
        foreach ($this->items as $key => $currentItem) {
            if ($item instanceof $currentItem) {
                unset($this->items[$key]);
                $this->increaseAvailableSize($item->getSize());
                return true;
            }
        }

        $itemClass = get_class($item);
        throw new \InvalidArgumentException("Item typed ${$itemClass} not found in the shelf.");
    }

    public function increaseAvailableSize(int $size): void
    {
        $this->availableSize += $size;
    }

    public function decreaseAvailableSize(int $size): void
    {
        $this->availableSize -= $size;
    }

    public function getAvailableSize(): int
    {
        return $this->availableSize;
    }
}