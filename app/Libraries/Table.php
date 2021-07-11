<?php


class Table extends BluePrint
{
    public function __construct()
    {
        parent::__construct();

//        `contact_id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
//        `email` VARCHAR(70),
//        `telephone` VARCHAR(20) NOT NULL,

        $tableCols = array(
            "test_id" => "INT AUTO_INCREMENT PRIMARY KEY NOT NULL",
            "test_name" => "VARCHAR(70) "
        );

        $this->createTable('test_table', $tableCols);
    }
}