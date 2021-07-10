<?php

require_once 'Model.php';

class User implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAll(): array
    {
        $this->db->query("SELECT * FROM `products`");
        return $this->db->resultSet();
    }

    public function getSingle(int $id): void
    {
        // TODO: Implement getSingle() method.
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
}