<?php

abstract class Account
{
    protected float $balance;

    public function __construct(
        protected string $agency,
        protected string $number,

        $balance,
    ) {
        if ($balance >= 0) {
            $this->balance = $balance;
        }
    }

    public function getInfo()
    {
        return "Agency: {$this->agency}, Number: {$this->number}";
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit(float $amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    abstract function withdraw(float $amount);
}
