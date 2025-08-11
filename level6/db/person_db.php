<?php

function listPeople()
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< 'SQL'
        SELECT * FROM people ORDER BY id
    SQL;

    $result = pg_query($conn, $query);
    $people = pg_fetch_all($result);

    pg_close($conn);

    return $people;
}

function getPerson(int $id)
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< SQL
        SELECT * FROM people WHERE id='{$id}'
    SQL;

    $result = pg_query($conn, $query);
    $person = pg_fetch_assoc($result);

    pg_close($conn);

    return $person;
}

function getNextPersonId()
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< 'SQL'
        SELECT max(id) as next FROM people
    SQL;

    $result = pg_query($conn, $query);
    $nextId = (int) pg_fetch_assoc($result)['next'] + 1;

    pg_close($conn);

    return $nextId;
}

function storePerson($person)
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

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
                '{$person['id']}',
                '{$person['name']}',
                '{$person['address']}',
                '{$person['neighborhood']}',
                '{$person['phone']}',
                '{$person['email']}',
                '{$person['city_id']}'
            )
    SQL;

    $result = pg_query($conn, $query);

    pg_close($conn);

    return $result;
}

function updatePerson($person)
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

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

    pg_close($conn);

    return $result;
}

function deletePerson(int $id)
{
    $dsn = 'host=localhost port=5432 dbname=book user=root password=password';
    $conn = pg_connect($dsn);

    $query = <<< SQL
        DELETE FROM people WHERE id='{$id}'
    SQL;

    $result = pg_query($conn, $query);

    pg_close($conn);

    return $result;
}
