<?php


class GenderModel implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->insertInto();
    }


    public function insertInto(): void
    {
        // TODO: Implement insertInto() method.

    }

    public function update(string $id): void
    {
        // TODO: Implement update() method.
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
}