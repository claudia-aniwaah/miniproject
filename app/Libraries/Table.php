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
        $this->customerTable();
        $this->categoryTable();
        $this->supplierTable();
        $this->productTable();
        $this->orderTable();
        $this->paymentTable();
        $this->order_detailsTable();

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
     * * CATEGORY
     *     category_id PK
     *     category_name 
     *     category_desc
     * 
     * PRODUCT
     *    product_id PK
     *    product_name 
     *    category_id FK ref(category.category_id)
     *    supplier_id FK ref(supplier.supplier_id)
     *    brand
     *    price
     *    quantity
     *    status
     * 
     * SUPPLIER
     *    supplier_id PK
     *    supplier_name
     *    address
     *    phone
     *    fax
     *    email
     *    supplier_desc
     * 
     * ORDER
     *     order_id 
     *     date_of_order
     *     customer_id FK ref(customer.customer_id)
     *     order_desc
     * 
     * PAYMENT 
     *     bill_number PK
     *     payment_type
     *     amount_paid
     * 
     * CUSTOMER
     *      customer_id PK
     *      staff_id FK ref(staff.staff_id)
     *      first_name
     *      last_name
     *      address
     *      phone
     *      email
     *      
     * ORDER_DETAILS
     *     order_details_id PK 
     *     date
     *     product_id FK ref(product.product_id)
     *     order_id FK ref(order.order_id)
     *     size
     *     price
     *     quantity
     *     discount
     *     total
     *     bill_number FK ref(payment.bill_number)
     * 
     *    
     *    
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
        $value = array(2, 1, 2, "Claudia", "Aniwaah", null, "Some address in Suame", "0547623711", "claudiaaniwaah18@gmail.com", $hash_password);
        $this->db->insert($value);
    }


    private function customerTable(): void
    {
        $tableCols = array(
            "customer_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "staff_id" =>  "INT NOT NULL",
            "first_name" => "VARCHAR(50)",
            "last_name" => "VARCHAR(50)",
            "address" => "VARCHAR(100)",
            "phone_number" => "VARCHAR(50)",
            "email" => "VARCHAR(50)",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'customer', table_params: $tableCols)
            ->setFK(table_name: 'customer', col: 'staff_id', ref_table_name: 'staff', ref_col: 'staff_id', constraint_name: 'fk_staff');
    }



    private function categoryTable(): void
    {
        $tableCols = array(
            "category_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "category_name" => "VARCHAR(50)",
        );
        $this->createTable(table_name: 'category', table_params: $tableCols);


        $sql = "INSERT INTO category (`category_name`) SELECT * FROM (SELECT (?)) AS tmp WHERE NOT EXISTS (SELECT `category_name` FROM category WHERE `category_name` = (?)) LIMIT 1";
        $this->db->query(sql: $sql);
        $values = array(
            'electronics' => array("Electronics", "Electronics"),
            'groceries' => array("Groceries", "Groceries")
        );
        foreach ($values as $value) {
            $this->db->insert($value);
        }
    }


    private function supplierTable(): void
    {
        $tableCols = array(
            "supplier_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "supplier_name" => "VARCHAR(50)",
            "address" => "VARCHAR(100)",
            "phone_number" => "VARCHAR(50)",
            "email" => "VARCHAR(50)",
            "supplier_desc" => "VARCHAR(100)",
            "fax" => "VARCHAR(50)",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'supplier', table_params: $tableCols);
    }


    private function productTable(): void
    {
        $tableCols = array(
            "product_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "product_name" => "VARCHAR(50)",
            "category_id" =>  "INT NOT NULL",
            "supplier_id" =>  "INT NOT NULL",
            "brand_name" => "VARCHAR(50)",
            "price" =>  "DECIMAL(13,2) NOT NULL",
            "quantity" =>  "INT NOT NULL",
            "status" => "VARCHAR(50)",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'product', table_params: $tableCols)
            ->setFK(table_name: 'product', col: 'category_id', ref_table_name: 'category', ref_col: 'category_id', constraint_name: 'fk_category')
            ->setFK(table_name: 'product', col: 'supplier_id', ref_table_name: 'supplier', ref_col: 'supplier_id', constraint_name: 'fk_supplier');
    }



    private function orderTable(): void
    {
        $tableCols = array(
            "order_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "order_of_date" =>  "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "customer_id" => "INT NOT NULL",
            "order_desc" => "VARCHAR(200)"
        );
        $this->createTable(table_name: 'order', table_params: $tableCols)
            ->setFK(table_name: 'order', col: 'customer_id', ref_table_name: 'customer', ref_col: 'customer_id', constraint_name: 'fk_customer');
    }




    private function paymentTable(): void
    {
        $tableCols = array(
            "bill_number" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "payment_type" =>   "INT NOT NULL",
            "amount" =>  "DECIMAL(13,2) NOT NULL",
            "created_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "updated_at" => "DATETIME ON UPDATE CURRENT_TIMESTAMP"
        );
        $this->createTable(table_name: 'payment', table_params: $tableCols);
    }



    private function order_detailsTable(): void
    {
        $tableCols = array(
            "order_detail_id" => "INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "date_of_order" =>  "DATETIME DEFAULT CURRENT_TIMESTAMP",
            "product_id" => "INT NOT NULL",
            "order_id" => "INT NOT NULL",
            "size" => "INT NOT NULL",
            "price" =>  "DECIMAL(13,2) NOT NULL",
            "quantity" =>  "INT NOT NULL",
            "total" =>  "DECIMAL(13,2) NOT NULL",
            "bill_number" =>  "INT"
         );
        $this->createTable(table_name: 'order_details', table_params: $tableCols)
            ->setFK(table_name: 'order_details', col: 'product_id', ref_table_name: 'product', ref_col: 'product_id', constraint_name: 'fk_product')
            ->setFK(table_name: 'order_details', col: 'order_id', ref_table_name: 'order', ref_col: 'order_id', constraint_name: 'fk_order');
    }


}
