<?php

class Maker
{
    public function __construct(
        private string $name,
        private string $address,
        private string $document,
    ) {}

    public function getName()
    {
        return $this->name;
    }
}
