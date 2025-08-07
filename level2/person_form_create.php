<html>

<head>
    <meta charset="uft-8">
    <title>Person registration</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    <form enctype="multipart/form-data" method="post" action="person_store.php">
        <label>ID</label>
        <input name="id" readonly="1" type="text" style="width: 30%">
        <label>Name</label>
        <input name="name" type="text" style="width: 50%">
        <label>Address</label>
        <input name="address" type="text" style="width: 50%">
        <label>Neighborhood</label>
        <input name="neighborhood" type="text" style="width: 25%">
        <label>Phone</label>
        <input name="phone" type="text" style="width: 25%">
        <label>Email</label>
        <input name="email" type="text" style="width: 25%">
        <label>City</label>
        <select name="city_id" style="width: 25%">
        <?php

        require_once 'city_combo_list.php';
        echo city_combo_list();

        ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>
