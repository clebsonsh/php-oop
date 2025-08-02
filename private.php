<?php

class Person
{
    private string $dateOfBirth;

    public function __construct(
        private string $name,
        private string $address,
    ) {}

    public function setDateOfBirth($dateOfBirth)
    {
        $parts = explode('-', $dateOfBirth);

        if (
            count($parts) != 3 or
            ! checkdate($parts[1], $parts[2], $parts[0])
        ) {
            return false;
        }

        $this->dateOfBirth = $dateOfBirth;

        return true;
    }
}

$person = new Person('John Doe', 'Street Sargent 42');
$invalidDateOfBirth = 'July 26, 1990';

if ($person->setDateOfBirth($invalidDateOfBirth)) {
    echo 'Date of Birth set to: ('.$invalidDateOfBirth.')'.PHP_EOL;
} else {
    echo 'Date of Birth not set to: ('.$invalidDateOfBirth.'). Invalid date format, use yyyy-mm-dd'.PHP_EOL;
}

$validDateOfBirth = '1990-07-26';

if ($person->setDateOfBirth($validDateOfBirth)) {
    echo 'Date of Birth set to: ('.$validDateOfBirth.')'.PHP_EOL;
} else {
    echo 'Date of Birth not set to: ('.$validDateOfBirth.'). Invalid date format, use yyyy-mm-dd'.PHP_EOL;
}

print_r($person);
