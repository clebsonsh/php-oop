<?php

require_once 'classes/Preferences.php';

$p1 = Preferences::getInstance();
echo 'The language is: '.$p1->getData('language').PHP_EOL;
$p1->setData('language', 'pt');
echo 'The language is: '.$p1->getData('language').PHP_EOL;

$p2 = Preferences::getInstance();
echo 'The language is: '.$p2->getData('language').PHP_EOL;

$p1->save();
