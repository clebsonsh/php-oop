<?php

// open Postgres connection
$conn = pg_connect('host=localhost port=5432 dbname=book user=root password=password');

$query = 'SELECT id, name FROM famous';

$result = pg_query($conn, $query);

if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        echo $row['id'].' - '.$row['name'].PHP_EOL;
    }
}

// clone connection
pg_close($conn);
