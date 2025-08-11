<?php

require_once 'db/person_db.php';

if (! empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'edit') {
        $id = (int) $_GET['id'];
        $person = getPerson($id);

    } elseif ($_REQUEST['action'] == 'save') {
        $person = $_POST;
        if (empty($_POST['id'])) {
            $person['id'] = getNextPersonId();
            $result = storePerson($person);
        } else {
            $result = updatePerson($person);
        }

        echo $result ? 'Record saved successfully' : pg_last_error($conn);

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
