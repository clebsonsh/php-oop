<?php

// open MySQL connection
$conn = mysqli_connect('127.0.0.1', 'root', '', 'book');

$query = 'SELECT id, name FROM famous';

$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['id'].' - '.$row['name'].PHP_EOL;
    }
}

// clone connection
mysqli_close($conn);
