<?php

require_once 'classes/Product.php';
require_once 'classes/Characteristic.php';

$product = new Product('Chocolate', 10, 7);

$product->addCharacteristic('Color', 'White');
$product->addCharacteristic('Weight', '2.6 kg');
$product->addCharacteristic('Potence', '20 watts RMS');

echo 'Product: '.$product->getDescription().PHP_EOL;
foreach ($product->getCharacteristics() as $characteristic) {
    echo ' Characteristic: '.$characteristic->getName().' - '.$characteristic->getValue().PHP_EOL;
}
