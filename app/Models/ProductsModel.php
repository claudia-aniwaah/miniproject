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
//        $sql = "INSERT INTO `product`(`product_name`,`category_id`,`supplier_id`,`brand_name`,`price`,`quantity`, `status`) VALUES(?,?,?,?,?,?,?)";
//        $this->db->query(sql: $sql);
//        $value = array(implode(",", $values));
//        $this->db->insert($value);
    }

    public function update(string $id): bool
    {
        // TODO: Implement update() method.
        return false;
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

    public function insert(array $values): bool
    {
        $sql = "INSERT INTO `product`(`product_name`,`category_id`,`supplier_id`,`brand_name`,`price`,`quantity`, `status`) VALUES(?,?,?,?,?,?,?)";
        $this->db->query(sql: $sql);
        if ($this->db->insert($values)) {
            return true;
        }
        return false;

    }
}
