<?php

class Person
{
    public function __construct(
        protected string $name,
    ) {}
}

class Employee extends Person
{
    private string $position;

    private float $salary;

    public function hire(string $position, float $salary)
    {
        if (is_numeric($salary) and $salary > 0) {
            $this->position = $position;
            $this->salary = $salary;
        }
    }

    public function getInfo()
    {
        return "Name: {$this->name}, Position: {$this->position}, Salary: {$this->salary}";
    }
}

$employee = new Employee('John Doe');
$employee->hire('Janitor', 1600);
echo $employee->getInfo();
