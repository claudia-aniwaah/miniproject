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
//        $sql = "INSERT INTO `supplier`(`supplier_name`,`address`,`phone_number`,`email`,`supplier_desc`,`fax`) VALUES(?,?,?,?,?,?)";
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

    public function insert(array $values): bool
    {
        $sql = "INSERT INTO `supplier`(`supplier_name`,`address`,`phone_number`,`email`,`supplier_desc`,`fax`) VALUES(?,?,?,?,?,?)";
        $this->db->query(sql: $sql);
        $value = array(implode(",", $values));
        if ($this->db->insert($value)) {
            return true;
        }

        return false;
    }
}
