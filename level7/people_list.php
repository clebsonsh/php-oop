<?php

require_once 'classes/Person.php';

try {
    if (! empty($_GET['action']) and $_GET['action'] == 'delete') {
        $id = (int) $_GET['id'];
        Person::delete($id);
    }

    $people = Person::all();
} catch (Exception $e) {
    echo $e->getMessage();
}

$items = '';
foreach ($people as $person) {
    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $person['id'], $item);
    $item = str_replace('{name}', $person['name'], $item);
    $item = str_replace('{address}', $person['address'], $item);
    $item = str_replace('{neighborhood}', $person['neighborhood'], $item);
    $item = str_replace('{phone}', $person['phone'], $item);
    $item = str_replace('{email}', $person['email'], $item);
    $items .= $item;
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);

echo $list;
