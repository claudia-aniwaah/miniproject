<?php

require_once 'interfaces/Model.php';

class UserModel implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->insertInto();
    }


    public function getAll(): array
    {
        $this->db->query(sql: "SELECT * FROM `gender`");
        return $this->db->resultSet();
    }

    public function getSingle(int $id): mixed
    {
        $this->db->query(sql: "SELECT * FROM `staff` WHERE staff_id=$id");
        return $this->db->getSingle();
    }

    public function getFrom(DateTime $dateTime): void
    {
        // TODO: Implement getFrom() method.
    }

    public function search($key): array
    {
        // TODO: Implement search() method.
        return [];
    }

    public function insertInto(): void
    {
        // TODO: Implement insertInto() method.

    }

    public function rowCount(): int
    {
        return $this->db->rowCount();
    }

    public function update(string $id): void
    {
        // TODO: Implement update() method.
    }
}
