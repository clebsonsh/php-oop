<?php

class Preferences
{
    /** @var array<string, string> */
    private array $data;

    private static Preferences $instance;

    private function __construct()
    {
        $this->data = parse_ini_file('application.ini');
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function setData(string $key, string $value)
    {
        $this->data[$key] = $value;
    }

    public function getData(string $key)
    {
        return $this->data[$key];
    }

    public function save()
    {
        $content = '';

        if ($this->data) {
            foreach ($this->data as $key => $value) {
                $content .= "{$key} = \"{$value}\" \n";
            }
        }

        file_put_contents('application.ini', $content);
    }
}
