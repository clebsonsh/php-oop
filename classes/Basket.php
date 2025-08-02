<?php

class Basket
{
    private string $time;

    /** @var array<Product> */
    private array $items;

    public function __construct(
    ) {
        $this->time = date('Y-m-d H:i:s');
        $this->items = [];
    }

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTime()
    {
        return $this->time;
    }
}
