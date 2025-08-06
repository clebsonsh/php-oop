<?php

function city_combo_list(?int $id = null)
{
    $output = '';

    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = 'SELECT id, name FROM cities';

    $rows = pg_query($conn, $query);
    if($rows) {
        while ($row = pg_fetch_assoc($rows)) {
            $check = $row['id'] == $id ? 'selected' : '';
            $output .= "<option {$check} value='{$row['id']}'>{$row['name']}</option>\n";
        }
    }

    pg_close($conn);

    return $output;
}
