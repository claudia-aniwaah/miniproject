<?php


class Table extends BluePrint
{
    public function __construct()
    {
        parent::__construct();

        $this->genderTable();
        $this->maritalStatusTable();
        $this->positionsTable();
        $this->staffTable();
    }

    /*
     * GENDER
     *      gender_id PK
     *      gender_name
     *
     * MARITAL_STATUS
     *      marital_status_id PK
     *      status
     *
     * POSITIONS
     *      position_id PK
     *      position_name
     *      position_desc
     *      position_salary
     * STAFF
     *      staff_id PK
     *      position_id FK ref(positions.position_id)
     *      gender_id FK ref(gender.gender_id)
     *      marital_status_id FK ref(marital_status.marital_status_id)
     *      first_name
     *      last_name
     *      address
     *      phone_number
     *      email
     *      user_name
     *      password
     *      created_at
     *      updated_at
     * */


    private function genderTable(): void
    {
        $tableCols = array(
            "gender_id" => "INT NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "gender_name" => "VARCHAR(10)"
        );
        $this->createTable(table_name: 'gender', table_params: $tableCols);


        $sql = "INSERT INTO gender (gender_name) SELECT * FROM (SELECT (?)) AS tmp WHERE NOT EXISTS (SELECT gender_name FROM gender WHERE gender_name = (?)) LIMIT 1";
        $this->db->query(sql: $sql);
        $values = array(
            'male' => array("Male", "Male"),
            'female' => array("Female", "Female"),
            'other' => array("Other", "Other"),
        );
        foreach ($values as $value) {
            $this->db->insert($value);
        }
    }

    private function maritalStatusTable(): void
    {
        $tableCols = array(
            "marital_status_id" => "INT PRIMARY KEY NOT NULL AUTO_INCREMENT",
            "status" => "VARCHAR(30) "
        );
        $this->createTable(table_name: 'marital_status', table_params: $tableCols);

        $sql = "INSERT INTO marital_status (status) SELECT * FROM (SELECT (?)) AS tmp WHERE NOT EXISTS (SELECT status FROM marital_status WHERE status = (?)) LIMIT 1";

        $this->db->query(sql: $sql);
        $values = array(
            'married' => array("Married", "Married"),
            'single' => array("Single", "Single"),
            'other' => array("Other", "Other"),
        );
        foreach ($values as $value) {
            $this->db->insert($value);
        }

    }

    private function positionsTable(): void
    {
        $tableCols = array(
            "position_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "position_name" => "VARCHAR(50)",
            "position_salary" => "DECIMAL(13,2)",
        );
        $this->createTable(table_name: 'positions', table_params: $tableCols);

        $sql = "INSERT INTO positions (`position_name`, `position_salary`) SELECT * FROM (SELECT (?),(?)) AS tmp WHERE NOT EXISTS (
            SELECT `position_name` FROM positions WHERE `position_name` = (?)
        ) LIMIT 1";

        $this->db->query(sql: $sql);
        //REPLACE POSITION WITH ANY POSITION YOU WANT
        //[$position,$salary,$position]
        $values = array(
            'ceo' => array("Chief Executive officer(CEO)", 4000, "Chief Executive officer(CEO)"),
            'hr' => array("Human Resource Manager", 3000, "Human Resource Manager"),
            'coo' => array("Chief Operations officer(CEO)", 3500, "Chief Operations officer(CEO)"),
            'salesperson' => array("Sales Person", 1500, "Sales Person"),
        );
        foreach ($values as $value) {
            $this->db->insert($value);
        }

    }


    private function staffTable(): void
    {
        $tableCols = array(
            "staff_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "position_id" => "INT NOT NULL",
            "gender_id" => "INT NOT NULL",
            "marital_status_id" => "INT NOT NULL",
            "first_name" => "VARCHAR(50) NOT NULL",
            "last_name" => "VARCHAR(50) NOT NULL",
            "other_name" => "VARCHAR(50)",
            "address" => "VARCHAR(100)",
            "phone_number" => "VARCHAR(50)",
            "email" => "VARCHAR(50) UNIQUE",
            "password" => "VARCHAR(250)",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'staff', table_params: $tableCols)
            ->setFK(table_name: 'staff', col: 'position_id', ref_table_name: 'positions', ref_col: 'position_id', constraint_name: 'fk_positions')
            ->setFK(table_name: 'staff', col: 'gender_id', ref_table_name: 'gender', ref_col: 'gender_id', constraint_name: 'fk_gender')
            ->setFK(table_name: 'staff', col: 'marital_status_id', ref_table_name: 'marital_status', ref_col: 'marital_status_id', constraint_name: 'fk_marital_status');

        $sql = "INSERT IGNORE INTO `staff`(`position_id`,`gender_id`,`marital_status_id`,`first_name`,`last_name`,`other_name`, `address`,`phone_number`, `email`,`password`)
                VALUES( (?),(?),(?),(?),(?),(?),(?),(?),(?),(?))";

        $this->db->query(sql: $sql);
        $hash_password = password_hash('default_password', PASSWORD_DEFAULT);
        $value = array(2, 1, 2, "Claudia", "Aniwaah", null, "Some address", "0543453938", "claudiaaniwaah@gmail.com", $hash_password);
        $this->db->insert($value);
    }

    private function customerTable(): void
    {
        //TODO: Customer table implementation
    }


}

