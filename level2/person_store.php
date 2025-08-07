<?php

$data = $_POST;

$dsn = 'host=localhost port=5432 dbname=book user=root password=password';
$conn = pg_connect($dsn);

$result = pg_query($conn, 'SELECT max(id) as next FROM people');
$next = (int) pg_fetch_assoc($result)['next'] + 1;

$query = <<< SQL
    INSERT INTO
        people (
            id,
            name,
            address,
            neighborhood,
            phone,
            email,
            city_id
        )
    VALUES
        (
            '{$next}',
            '{$data['name']}',
            '{$data['address']}',
            '{$data['neighborhood']}',
            '{$data['phone']}',
            '{$data['email']}',
            '{$data['city_id']}'
        )
SQL;

$result = pg_query($conn, $query);
if ($result) {
    echo 'Record inserted successfully';
} else {
    echo pg_last_error($conn);
}

pg_close($conn);
