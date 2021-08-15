<?php


class MaritalStatusModel implements Model
{


    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function insertInto(): void
    {
        // TODO: Implement insertInto() method.
    }

    public function update(string $id): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
        return [];
    }

    public function getSingle(int $id): mixed
    {
        // TODO: Implement getSingle() method.
        return null;
    }

    public function getFrom(DateTime $dateTime)
    {
        // TODO: Implement getFrom() method.
    }

    public function rowCount(): int
    {
        return $this->db->rowCount();
    }

    public function search($key)
    {
        // TODO: Implement search() method.
    }

    public function insert(array $values): bool
    {
        // TODO: Implement insert() method.
        return false;
    }
}