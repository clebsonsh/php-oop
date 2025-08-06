<?php

// open Postgres connection
$conn = pg_connect('host=localhost port=5432 dbname=book user=root password=password');

// insert a bunch os famous
pg_query($conn, "INSERT INTO famous (id, name) VALUES (1, 'Érico Veríssimo')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (2, 'John Lennon')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (3, 'Mahatma Gandhi')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (4, 'Ayrton Senna')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (5, 'Charlie Chaplin')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (6, 'Anita Garibaldi')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (7, 'Mário Quintana')");
pg_query($conn, "INSERT INTO famous (id, name) VALUES (8, 'Taylor Swift')");

// clone connection
pg_close($conn);
