<?php

require_once 'classes/Account.php';
require_once 'classes/SavingsAccount.php';
require_once 'classes/CheckingAccount.php';

/** @var array<int, Account> */
$accounts = [];
$accounts[] = new CheckingAccount(6677, 'CC.1234.56', 100, 500);
$accounts[] = new SavingsAccount(6678, 'PP.1234.57', 100);

foreach ($accounts as $key => $account) {
    echo 'Account: '.$account->getInfo().PHP_EOL;
    echo ' Current Balance: '.$account->getBalance().PHP_EOL;

    $account->deposit(200);
    echo ' Deposit of: 200'.PHP_EOL;
    echo ' Current Balance: '.$account->getBalance().PHP_EOL;

    if ($account->withdraw(700)) {
        echo ' Withdraw of: 700'.PHP_EOL;
    } else {
        echo ' Withdraw of: 700 (not allowed)'.PHP_EOL;
    }

    echo ' Current Balance: '.$account->getBalance().PHP_EOL;
}
