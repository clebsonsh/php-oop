<?php

require_once 'city_combo_list.php';

$id = $name = $address = $neighborhood = $phone = $email = $city_id = null;

if (! empty($_REQUEST['action'])) {
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    if ($_REQUEST['action'] == 'edit') {
        $id = (int) $_GET['id'];
        $result = pg_query($conn, "SELECT * FROM people WHERE id='{$id}'");

        if ($row = pg_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $address = $row['address'];
            $neighborhood = $row['neighborhood'];
            $phone = $row['phone'];
            $email = $row['email'];
            $city_id = $row['city_id'];
        }
    } elseif ($_REQUEST['action'] == 'save') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $neighborhood = $_POST['neighborhood'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $city_id = $_POST['city_id'];

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
                        '{$name}',
                        '{$address}',
                        '{$neighborhood}',
                        '{$phone}',
                        '{$email}',
                        '{$city_id}'
                    )
            SQL;

            $result = pg_query($conn, $query);
        } else {
            $query = <<< SQL
                UPDATE people
                SET name = '{$name}',
                    address = '{$address}',
                    neighborhood = '{$neighborhood}',
                    phone = '{$phone}',
                    email = '{$email}',
                    city_id = '{$city_id}'
                WHERE id = '{$id}'
            SQL;

            $result = pg_query($conn, $query);
        }

        echo $result ? 'Record saved successfully' : pg_last_error($conn);
        pg_close($conn);

        $id = $name = $address = $neighborhood = $phone = $email = $city_id = null;
    }
}

?>

<html>

<head>
    <meta charset="uft-8">
    <title>Person registration</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    <form enctype="multipart/form-data" method="post" action="person_form.php?action=save">
        <label>ID</label>
        <input name="id" readonly="1" type="text" style="width: 30%" value="<?= $id?>">
        <label>Name</label>
        <input name="name" type="text" style="width: 50%" value="<?= $name?>">
        <label>Address</label>
        <input name="address" type="text" style="width: 50%" value="<?= $address?>">
        <label>Neighborhood</label>
        <input name="neighborhood" type="text" style="width: 25%" value="<?= $neighborhood?>">
        <label>Phone</label>
        <input name="phone" type="text" style="width: 25%" value="<?= $phone?>">
        <label>Email</label>
        <input name="email" type="text" style="width: 25%" value="<?= $email?>">
        <label>City</label>
        <select name="city_id" style="width: 25%">
        <?= city_combo_list($city_id) ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>
