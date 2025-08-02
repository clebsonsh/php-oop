<?php

class CheckingAccount extends Account
{
    public function __construct(
        protected float $limit,

        string $agency,
        string $number,
        float $balance,
    ) {
        parent::__construct($agency, $number, $balance);
    }

    public final function withdraw(float $amount)
    {
        if (($this->balance + $this->limit) < $amount) {
            return false;
        }

        $this->balance -= $amount;

        return true;
    }
}
