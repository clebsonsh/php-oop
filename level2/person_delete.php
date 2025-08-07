<?php

$data = $_GET;

if ($data['id']) {
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< SQL
        DELETE FROM people
        WHERE id = '{$data['id']}'
    SQL;

    $result = pg_query($conn, $query);
    if ($result) {
        echo 'Record deleted successfully';
    } else {
        echo pg_last_error($conn);
    }

    pg_close($conn);
}
