<?php

$data = $_POST;

if ($data['id']) {
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< SQL
        UPDATE people
        SET name = '{$data['name']}',
            address = '{$data['address']}',
            neighborhood = '{$data['neighborhood']}',
            phone = '{$data['phone']}',
            email = '{$data['email']}',
            city_id = '{$data['city_id']}'
        WHERE id = '{$data['id']}'
    SQL;

    $result = pg_query($conn, $query);
    if ($result) {
        echo 'Record updated successfully';
    } else {
        echo pg_last_error($conn);
    }

    pg_close($conn);
}
