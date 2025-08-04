<?php

require_once 'classes/Budget.php';
require_once 'classes/Budgetable.php';
require_once 'classes/Product.php';
require_once 'classes/Service.php';

$budget = new Budget;

$budget->add(new Product('Coffee machine', 10, 299), 1);
$budget->add(new Product('Coffee mug', 20, 29), 1);
$budget->add(new Product('Chocolate bar', 10, 7), 3);

$budget->add(new Service('Lawn mowing', 20), 1);
$budget->add(new Service('Beard trimming', 20), 1);
$budget->add(new Service('Apartment cleaning', 30), 1);

echo $budget->calculateTotal();
