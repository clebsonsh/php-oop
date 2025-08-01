<?php

require_once 'classes/Maker.php';
require_once 'classes/Product.php';

$maker = new Maker('Chocolate Factory', 'Willy Wonka Street', '1234985235');
$product = new Product('Chocolate', 10, 7);

$product->setMaker($maker);

echo 'A descrição é: '.$product->getDescription().PHP_EOL;
echo 'A fabricante é: '.$product->getMaker()->getName().PHP_EOL;
