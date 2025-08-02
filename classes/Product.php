<?php

class Product
{
    private Maker $maker;

    /** @var array<int, Characteristic> */
    private array $characteristics;

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

    public function addCharacteristic(string $name, string $value)
    {
        $this->characteristics[] = new Characteristic($name, $value);
    }

    public function getCharacteristics()
    {
        return $this->characteristics;
    }
}
