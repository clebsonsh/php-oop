<?php

if (! empty($_REQUEST['action'])) {
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    if ($_REQUEST['action'] == 'edit') {
        $id = (int) $_GET['id'];
        $result = pg_query($conn, "SELECT * FROM people WHERE id='{$id}'");
        $person = pg_fetch_assoc($result);

    } elseif ($_REQUEST['action'] == 'save') {
        $person = $_POST;
        if (empty($_POST['id'])) {
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
                        '{$person['name']}',
                        '{$person['address']}',
                        '{$person['neighborhood']}',
                        '{$person['phone']}',
                        '{$person['email']}',
                        '{$person['city_id']}'
                    )
            SQL;

            $result = pg_query($conn, $query);

            $person['id'] = null;
            $person['name'] = '';
            $person['address'] = '';
            $person['neighborhood'] = '';
            $person['phone'] = '';
            $person['email'] = '';
            $person['city_id'] = null;
        } else {
            $query = <<< SQL
                UPDATE people
                SET name = '{$person['name']}',
                    address = '{$person['address']}',
                    neighborhood = '{$person['neighborhood']}',
                    phone = '{$person['phone']}',
                    email = '{$person['email']}',
                    city_id = '{$person['city_id']}'
                WHERE id = '{$person['id']}'
            SQL;

            $result = pg_query($conn, $query);
        }

        echo $result ? 'Record saved successfully' : pg_last_error($conn);
        pg_close($conn);

    }
} else {
    $person['id'] = null;
    $person['name'] = '';
    $person['address'] = '';
    $person['neighborhood'] = '';
    $person['phone'] = '';
    $person['email'] = '';
    $person['city_id'] = null;
}

require_once 'city_combo_list.php';

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $person['id'], $form);
$form = str_replace('{name}', $person['name'], $form);
$form = str_replace('{address}', $person['address'], $form);
$form = str_replace('{neighborhood}', $person['neighborhood'], $form);
$form = str_replace('{phone}', $person['phone'], $form);
$form = str_replace('{email}', $person['email'], $form);
$form = str_replace('{city_id}', $person['city_id'], $form);
$form = str_replace('{cities}', city_combo_list($person['city_id']), $form);

echo $form;
