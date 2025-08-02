<?php

class SavingsAccount extends Account
{
    public function withdraw(float $amount)
    {
        if ($this->balance < $amount) {
            return false;
        }

        $this->balance -= $amount;

        return true;
    }
}
