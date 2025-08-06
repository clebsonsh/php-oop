<?php

// open MySQL connection
$conn = mysqli_connect('127.0.0.1', 'root', '', 'book');

// insert a bunch os famous
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (1, 'Érico Veríssimo')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (2, 'John Lennon')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (3, 'Mahatma Gandhi')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (4, 'Ayrton Senna')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (5, 'Charlie Chaplin')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (6, 'Anita Garibaldi')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (7, 'Mário Quintana')");
mysqli_query($conn, "INSERT INTO famous (id, name) VALUES (8, 'Taylor Swift')");

// clone connection
mysqli_close($conn);
