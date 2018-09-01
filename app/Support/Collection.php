<?php

namespace App\Support;

class Collection
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
          array_push($this->items, $item);
        }
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
      return count($this->items);
    }
}
