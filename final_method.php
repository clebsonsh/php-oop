<?php

require_once 'classes/Account.php';
require_once 'classes/CheckingAccount.php';

class SpecialCheckingAccount extends CheckingAccount
{
    // Fatal error: Cannot override final method CheckingAccount::withdraw()
    public function withdraw(float $amount)
    {
        $this->balance -= $amount;
    }
}
