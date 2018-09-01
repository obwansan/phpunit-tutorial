<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
{
    protected $items = [];

    // Set default to empty array to stop empty_instantiated_collection_returns_no_items failing.
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

    public function getIterator()
    {
        return new ArrayIterator($this->items);;
    }
}
