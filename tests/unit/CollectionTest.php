<?php

class CollectionTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
      $collection = new \App\Support\Collection;

      $this->assertEmpty($collection->get());
    }
}
