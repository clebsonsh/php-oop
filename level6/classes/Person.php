<?php

class Person
{
    public static function all()
    {
        $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = <<< 'SQL'
            SELECT * FROM people ORDER BY id
        SQL;

        $result = $conn->query($sql);

        return $result->fetchAll();
    }

    public static function find($id)
    {
        $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = <<< SQL
            SELECT * FROM people WHERE id='{$id}'
        SQL;

        $result = $conn->query($sql);

        return $result->fetch();
    }

    public static function save($person)
    {
        $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (empty($person['id'])) {
            $result = $conn->query(<<< 'SQL'
                SELECT max(id) as next FROM people
            SQL);
            $row = $result->fetch();
            $person['id'] = (int) $row['next'] + 1;

            $sql = <<< SQL
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
                RETURNING id
            SQL;

            $result = $conn->query($sql);

            return $result->fetch()['id'];
        } else {
            $sql = <<< SQL
                UPDATE people
                SET name = '{$person['name']}',
                    address = '{$person['address']}',
                    neighborhood = '{$person['neighborhood']}',
                    phone = '{$person['phone']}',
                    email = '{$person['email']}',
                    city_id = '{$person['city_id']}'
                WHERE id = '{$person['id']}'
            SQL;

            $conn->query($sql);

            return $person['id'];
        }

    }

    public static function delete($id)
    {
        $conn = new PDO('pgsql:dbname=book;user=root;password=password;host=localhost');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = <<< SQL
            DELETE FROM people WHERE id='{$id}'
        SQL;

        return $conn->query($sql);
    }
}
