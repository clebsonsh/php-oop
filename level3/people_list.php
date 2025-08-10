<html>
    <head>
        <meta charset="utf-8">
        <title>List of people</title>
        <link href="css/list.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
    <?php

    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    if (! empty($_GET['action']) and $_GET['action'] == 'delete') {
        $id = (int) $_GET['id'];
        pg_query($conn, "DELETE FROM people WHERE id='{$id}'");
    }

    $result = pg_query($conn, 'SELECT * FROM people ORDER BY id');

    echo '<table border=1>';
    echo '<thead>';
    echo '<tr>';
    echo '<th> </th>';
    echo '<th> </th>';
    echo '<th> Id </th>';
    echo '<th> Name </th>';
    echo '<th> Address </th>';
    echo '<th> Neighborhood </th>';
    echo '<th> Phone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = pg_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $neighborhood = $row['neighborhood'];
        $phone = $row['phone'];
        $email = $row['email'];
        $city_id = $row['city_id'];
        echo '<tr>';
        echo "<td align='center'>
            <a href='person_form.php?action=edit&id={$id}'>
                <img src='images/edit.svg' style='width:17px'>
            </a>
        </td>";
        echo "<td align='center'>
            <a href='people_list.php?action=delete&id={$id}'>
                <img src='images/remove.svg' style='width:17px'>
            </a>
        </td>";
        echo "<td> {$id} </td>";
        echo "<td> {$name} </td>";
        echo "<td> {$address} </td>";
        echo "<td> {$neighborhood} </td>";
        echo "<td> {$phone} </td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    ?>
        <button onclick="window.location='person_form.php'">
            <img src='images/insert.svg' style='width:17px'> Add
        </button>
    </body>
</html>
