<?php

class Software
{
    private int $id;

    private string $name;

    public static int $counter = 0;

    public function __construct(string $name)
    {
        self::$counter++;
        $this->id = self::$counter;
        $this->name = $name;

        echo "Software {$this->id} - {$this->name}".PHP_EOL;
    }
}

new Software('Dia');
new Software('Gimp');
new Software('Gnumeric');
echo 'Quantity created = '.Software::$counter;
