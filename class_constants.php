<?php

class Person
{
    const GENDERS = [
        'M' => 'Male',
        'F' => 'Female',
    ];

    public function __construct(
        private string $name,
        private string $gender,
    ) {}

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return self::GENDERS[$this->gender];
    }
}

$jane = new Person('Jane Doe', 'F');
$john = new Person('John Doe', 'M');

echo 'Name: '.$jane->getName(). PHP_EOL;
echo 'Gender: '.$jane->getGender(). PHP_EOL;
echo 'Name: '.$john->getName(). PHP_EOL;
echo 'Gender: '.$john->getGender(). PHP_EOL;

print_r(Person::GENDERS);
