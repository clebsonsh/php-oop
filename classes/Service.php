<?php

class Service implements Budgetable
{
    public function __construct(
        private string $description,
        private float $price,
    ) {}

    public function getPrice()
    {
        return $this->price;
    }
}
