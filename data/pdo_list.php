<?php

try {
    $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');

    $result = $conn->query('SELECT id, name FROM famous');

    if ($result) {
        foreach ($result as $row) {
            echo $row['id'].' - '.$row['name'].PHP_EOL;
        }
    }

    $conn = null;
} catch (PDOException $e) {
    echo 'Error!: '.$e->getMessage().PHP_EOL;
}
