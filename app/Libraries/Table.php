<?php


class Table extends BluePrint
{
    public function __construct()
    {
        parent::__construct();

        $this->genderTable();
        $this->maritalStatusTable();
        $this->positionsTable();

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
            "gender_id" => "INT NOT NULL PRIMARY KEY",
            "gender_name" => "VARCHAR(10)"
        );
        $this->createTable('gender', $tableCols);

    }

    private function maritalStatusTable(): void
    {
        $tableCols = array(
            "marital_status_id" => "INT PRIMARY KEY NOT NULL",
            "status" => "VARCHAR(30) "
        );
        $this->createTable('marital_status', $tableCols);
    }

    private function positionsTable(): void
    {
        $tableCols = array(
            "position_id" => "INT",
            "position_name" => "VARCHAR(50)",
            "position_desc" => "VARCHAR(200)",
            "position_salary" => "DECIMAL(13,2)",
        );
        $this->createTable('positions', $tableCols);

    }

    private function customerTable(): void
    {
        //TODO: Customer table implementation
    }


}

