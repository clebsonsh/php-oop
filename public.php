<?php

class Person
{
    public $name;

    public $address;

    public $dateOfBirth;
}

$person = new Person;
$person->name = 'John Doe';
$person->address = 'Street Sargent 42';
$person->dateOfBirth = 'July 26, 1990';
$person->phone = '(11) 3408 2134'; // property defined at runtime
print_r($person);
