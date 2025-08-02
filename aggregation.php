<?php

require_once 'classes/Basket.php';
require_once 'classes/Product.php';

$basket = new Basket;

$basket->addItem(new Product('Chocolate', 10, 5));
$basket->addItem(new Product('Coffee', 100, 7));
$basket->addItem(new Product('Whiky', 200, 45));

foreach ($basket->getItems() as $item) {
    echo 'Item: '.$item->getDescription().PHP_EOL;
}
