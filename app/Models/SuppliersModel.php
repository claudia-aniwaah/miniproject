<?php
require_once 'interfaces/Model.php';


class SuppliersModel implements Model
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

    public function update(string $id): void
    {
        // TODO: Implement update() method.
    }

    public function getAll(): array
    {
        $this->db->query(sql: "SELECT * FROM `supplier`");
        return $this->db->resultSet();
        
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
}
