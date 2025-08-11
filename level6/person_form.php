<?php

require_once 'classes/Person.php';
require_once 'classes/City.php';

if (! empty($_REQUEST['action'])) {
    try {

        if ($_REQUEST['action'] == 'edit') {
            $id = (int) $_GET['id'];
            $person = Person::find($id);

        } elseif ($_REQUEST['action'] == 'save') {
            $person = $_POST;
            $person['id'] = Person::save($person);
            echo 'Record saved successfully';

        }
    } catch (Exception $e) {
        echo $e->getMessage();
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

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $person['id'], $form);
$form = str_replace('{name}', $person['name'], $form);
$form = str_replace('{address}', $person['address'], $form);
$form = str_replace('{neighborhood}', $person['neighborhood'], $form);
$form = str_replace('{phone}', $person['phone'], $form);
$form = str_replace('{email}', $person['email'], $form);
$form = str_replace('{city_id}', $person['city_id'], $form);

$cities = '';
foreach (City::all() as $city) {
    $check = $city['id'] == $person['city_id'] ? 'selected' : '';
    $cities .= "<option {$check} value='{$city['id']}'>{$city['name']}</option>\n";
}
$form = str_replace('{cities}', $cities, $form);

echo $form;
