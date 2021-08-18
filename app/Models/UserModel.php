<?php

require_once 'interfaces/Model.php';

class UserModel implements Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function getAll(): array
    {
        $this->db->query(sql: "SELECT * FROM `staff`");
        return $this->db->resultSet();
    }

    public function getSingle(int $id): mixed
    {
        $this->db->query(sql: "SELECT * FROM `staff` WHERE staff_id=$id");
        return $this->db->getSingle();
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

//    public function insertInto(array $values): void
//    {
////        $sql = "INSERT INTO `staff`(`position_id`,`gender_id`,`marital_status_id`,`first_name`,`last_name`,`other_name`, `address`, `phone_number`, `email`, `password`)                VALUES(?,?,?,?,?,?,?,?,?,?)";
////        $this->db->query(sql: $sql);
////        $value = array(implode(",", $values));
////        $this->db->insert($value);
//
//    }

    public function rowCount(): int
    {
        return $this->db->rowCount();
    }

    public function update(string $id): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    public function insert(array $values): bool
    {
        // TODO: Implement insert() method.
        return false;
    }
}
