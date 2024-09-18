<?php

class Set
{
    private $items = [];

    public function isEmpty()
    {
        return $this->size === 0;
    }

    public function add($item)
    {
        if ($item === null || $this->contains($item)) {
            return;
        }

        $this->items[] = $item;
    }

    public function contains($item)
    {
        return in_array($item, $this->items, true);
    }

    // ...
}
