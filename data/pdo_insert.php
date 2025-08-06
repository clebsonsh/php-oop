<?php

try {
    $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');

    $conn->exec("INSERT INTO famous (id, name) VALUES (1, 'Érico Veríssimo')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (7, 'Mário Quintana')");
    $conn->exec("INSERT INTO famous (id, name) VALUES (8, 'Taylor Swift')");

    $conn = null;
} catch (PDOException $e) {
    echo 'Error!: '.$e->getMessage().PHP_EOL;
}
