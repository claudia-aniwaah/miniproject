<?php
require_once 'interfaces/Model.php';


class ProductsModel implements Model
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
        $sql = "SELECT * FROM `product` 
                INNER JOIN `category` ON product.category_id = category.category_id 
                INNER JOIN `supplier` ON product.supplier_id = supplier.supplier_id
                ORDER BY product.product_id";

        $this->db->query(sql: $sql);
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
