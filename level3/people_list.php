<?php

$dsn = 'host=localhost port=5432 dbname=book user=root password=password';
$conn = pg_connect($dsn);

if (! empty($_GET['action']) and $_GET['action'] == 'delete') {
    $id = (int) $_GET['id'];
    pg_query($conn, "DELETE FROM people WHERE id='{$id}'");
}

$result = pg_query($conn, 'SELECT * FROM people ORDER BY id');

$items = '';
while ($row = pg_fetch_assoc($result)) {
    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $row['id'], $item);
    $item = str_replace('{name}', $row['name'], $item);
    $item = str_replace('{address}', $row['address'], $item);
    $item = str_replace('{neighborhood}', $row['neighborhood'], $item);
    $item = str_replace('{phone}', $row['phone'], $item);
    $item = str_replace('{email}', $row['email'], $item);
    $items .= $item;
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);

echo $list;
