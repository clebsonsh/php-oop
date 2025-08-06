<html>
<head>
    <meta charset="utf-8">
    <title> Cadastro de pessoa </title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<?php
    if (! empty($_GET['id'])) {

        $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
        $conn = pg_connect($dsn);

        $id = (int) $_GET['id'];

        $result = pg_query($conn, "SELECT * FROM people WHERE id='{$id}'");

        $row = pg_fetch_assoc($result);
        $id = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $neighborhood = $row['neighborhood'];
        $phone = $row['phone'];
        $email = $row['email'];
        $city_id = $row['city_id'];
    }
?>
<body>
    <form enctype="multipart/form-data" method="post" action="person_update.php">
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
        <?php
            require_once 'city_combo_list.php';
            echo city_combo_list($city_id);
        ?>
        </select>
        <input type="submit">
    </form>
</body>
</html>
