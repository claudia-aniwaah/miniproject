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
    }

    private function maritalStatusTable(): void
    {
        $tableCols = array(
            "marital_status_id" => "INT PRIMARY KEY NOT NULL AUTO_INCREMENT",
            "status" => "VARCHAR(30) "
        );
        $this->createTable(table_name: 'marital_status', table_params: $tableCols);
    }

    private function positionsTable(): void
    {
        $tableCols = array(
            "position_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "position_name" => "VARCHAR(50)",
            "position_desc" => "VARCHAR(200)",
            "position_salary" => "DECIMAL(13,2)",
        );
        $this->createTable(table_name: 'positions', table_params: $tableCols);

    }


    private function staffTable(): void
    {
        $tableCols = array(
            "staff_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "position_id" => "INT NOT NULL",
            "gender_id" => "INT NOT NULL",
            "marital_status_id" => "INT NOT NULL",
            "first_name" => "VARCHAR(50)",
            "last_name" => "VARCHAR(50)",
            "address" => "VARCHAR(100)",
            "phone_number" => "VARCHAR(50)",
            "email" => "VARCHAR(50)",
            "user_name" => "VARCHAR(50)",
            "password" => "VARCHAR(250)",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'staff', table_params: $tableCols)
            ->setFK(table_name: 'staff', col: 'position_id', ref_table_name: 'positions', ref_col: 'position_id', constraint_name: 'fk_positions');
    }

    private function customerTable(): void
    {
        //TODO: Customer table implementation
    }


}

