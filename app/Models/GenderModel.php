<?php


class GenderModel implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


//    public function insertInto(): void
//    {
//        // TODO: Implement insertInto() method.
//
//    }

    public function update(array $values,string $id): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    public function getAll(): array
    {
        $this->db->query(sql: "SELECT * FROM `gender`");
        return $this->db->resultSet();
    }

    public function getSingle(int $id): mixed
    {
        // TODO: Implement getSingle() method.
        return null;
    }

    public function getFrom(DateTime $dateTime): void
    {
        // TODO: Implement getFrom() method.
    }

    public function rowCount(): int
    {
        return $this->db->rowCount();
    }


    public function search($key): void
    {
        // TODO: Implement search() method.
    }

    public function insert(array $values): bool
    {
        // TODO: Implement insert() method.
        return false;
    }
}