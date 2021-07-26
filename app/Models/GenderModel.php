<?php


class GenderModel implements Model
{
    private Database $db;

    public function __construct()
    {
//        $this->db = Database::getInstance();
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
    }

    public function getSingle(int $id): void
    {
        // TODO: Implement getSingle() method.
    }

    public function getFrom(DateTime $dateTime): void
    {
        // TODO: Implement getFrom() method.
    }

    public function search($key): void
    {
        // TODO: Implement search() method.
    }
}