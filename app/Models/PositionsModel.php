<?php


class PositionsModel implements Model
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
        return;
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
}