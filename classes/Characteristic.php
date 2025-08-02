<?php

class Characteristic
{
    public function __construct(
        private string $name,
        private string $value,
    ) {}

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }
}
