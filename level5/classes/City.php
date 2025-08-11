<?php

class City
{
    public static function all()
    {
        $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = <<< 'SQL'
            SELECT id, name FROM cities
        SQL;

        $result = $conn->query($sql);

        return $result->fetchAll();
    }
}
