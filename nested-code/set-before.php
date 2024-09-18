<?php

class Set
{
    private $items = [];

    public function isEmpty()
    {
        if ($this->size === 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add($item)
    {
        if ($item === null) {
        }
        else {
          if (!$this->contains($item)) {
              $this->items[] = $item;
          }
        }
    }

    public function contains($item)
    {
        if (!$this->isEmpty()) {
            if (in_array($item, $this->items, true)) {
                return true;
            }
        }

        return false;
    }

    // ...
}
