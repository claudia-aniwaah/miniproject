<?php

class CategoryModel implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function insert(array $values): bool
    {
        // TODO: Implement insert() method.
        return false;
    }


    public function update(array $values, string $id): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    public function getAll(): array
    {
        $this->db->query(sql: "SELECT * FROM `category`");
        return $this->db->resultSet();
    }

    public function rowCount(): int
    {
        // TODO: Implement rowCount() method.
        return 0;
    }

    public function getSingle(int $id): mixed
    {
        // TODO: Implement getSingle() method.
        return null;
    }

    public function getFrom(DateTime $dateTime)
    {

    }

    public function search($key)
    {
        // TODO: Implement search() method.
    }
}