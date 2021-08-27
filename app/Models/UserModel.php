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
        $sql = "SELECT * FROM `staff` 
                INNER JOIN `positions` ON staff.position_id = positions.position_id 
                INNER JOIN `gender` ON staff.gender_id = gender.gender_id
                INNER JOIN `marital_status` ON staff.marital_status_id = marital_status.marital_status_id
                ORDER BY staff.staff_id";

        $this->db->query(sql: $sql);
        return $this->db->resultSet();
    }

    public function getSingle(int $id): mixed
    {
        $sql = "SELECT * FROM `staff` 
                INNER JOIN `positions` ON staff.position_id = positions.position_id 
                INNER JOIN `gender` ON staff.gender_id = gender.gender_id
                INNER JOIN `marital_status` ON staff.marital_status_id = marital_status.marital_status_id
                WHERE `staff_id` = $id
                ORDER BY staff.staff_id";

        $this->db->query(sql: $sql);
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


    public function rowCount(): int
    {
        return $this->db->rowCount();
    }

    public function update(array $values, string $id): bool
    {
//        var_dump($values);
        $sql = "UPDATE `staff` SET
                position_id = ?, 
                gender_id = ?,
                marital_status_id = ?, 
                first_name = ?,
                last_name = ?, 
                other_name = ?,
                address = ?, 
                phone_number = ?,
                email = ?
        WHERE staff_id = ?";

        $this->db->query(sql: $sql);
        if ($this->db->insert($values)) {
            return true;
        }
        return false;
    }

    public function insert(array $values): bool
    {
        $sql = "INSERT INTO `staff`(`position_id`,`gender_id`,`marital_status_id`,`first_name`,`last_name`, `other_name`,`address`,`phone_number`,`email`, `password`) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $this->db->query(sql: $sql);
        if ($this->db->insert($values)) {
            return true;
        }
        return false;
    }
}
