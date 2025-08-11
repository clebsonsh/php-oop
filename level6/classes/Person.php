<?php

class Person
{
    private static $conn;

    public static function getConnection()
    {
        if (empty(self::$conn)) {
            $dbConfig = parse_ini_file('config/db.ini');

            $host = $dbConfig['host'];
            $name = $dbConfig['name'];
            $user = $dbConfig['user'];
            $password = $dbConfig['password'];

            self::$conn = new PDO("pgsql:host={$host};dbname={$name};user={$user};password={$password}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$conn;
    }

    public static function all()
    {
        $conn = self::getConnection();

        $sql = <<< 'SQL'
            SELECT * FROM people ORDER BY id
        SQL;

        $result = $conn->query($sql);

        return $result->fetchAll();
    }

    public static function find($id)
    {
        $conn = self::getConnection();

        $sql = <<< 'SQL'
            SELECT * FROM people WHERE id=:id
        SQL;

        $result = $conn->prepare($sql);
        $result->execute([
            ':id' => $id,
        ]);

        return $result->fetch();
    }

    public static function save($person)
    {
        $conn = self::getConnection();

        if (empty($person['id'])) {
            $result = $conn->query(<<< 'SQL'
                SELECT max(id) as next FROM people
            SQL);
            $row = $result->fetch();
            $person['id'] = (int) $row['next'] + 1;

            $sql = <<< 'SQL'
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
                        :id,
                        :name,
                        :address,
                        :neighborhood,
                        :phone,
                        :email,
                        :city_id
                    )
            SQL;
        } else {
            $sql = <<< 'SQL'
                UPDATE people
                SET name = :name,
                    address = :address,
                    neighborhood = :neighborhood,
                    phone = :phone,
                    email = :email,
                    city_id = :city_id
                WHERE id = :id
            SQL;
        }

        $result = $conn->prepare($sql);
        $result->execute([
            ':id' => $person['id'],
            ':name' => $person['name'],
            ':address' => $person['address'],
            ':neighborhood' => $person['neighborhood'],
            ':phone' => $person['phone'],
            ':email' => $person['email'],
            ':city_id' => $person['city_id'],
        ]);

        return $person['id'];
    }

    public static function delete($id)
    {
        $conn = self::getConnection();

        $sql = <<< 'SQL'
            DELETE FROM people WHERE id=:id
        SQL;

        $result = $conn->prepare($sql);

        return $result->execute([
            ':id' => $id,
        ]);
    }
}
