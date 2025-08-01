<?php

class Product
{
    private Maker $maker;

    public function __construct(
        private string $description,
        private int $stock,
        private float $price,
    ) {}

    public function getDescription()
    {
        return $this->description;
    }

    public function setMaker(Maker $maker)
    {
        $this->maker = $maker;
    }

    public function getMaker()
    {
        return $this->maker;
    }
}
