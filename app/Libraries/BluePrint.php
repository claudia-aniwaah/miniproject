<?php


class BluePrint
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    protected function createTable(string $table_name, array $table_params, string $engine = "INNODB"): Database
    {
        $combine_stmt = array_map(static function ($key, $value) {
            return "`$key` {$value}";
        }, array_keys($table_params), $table_params);

        $this->db->query(sql: "CREATE TABLE `$table_name`" . "(" . implode(",", $combine_stmt) . ")ENGINE=$engine");
        $this->db->execute();
        return $this->db;
    }


    protected function initializeAutoIncrement(string $table_name, int $start_num): Database
    {
        $this->db->query(sql: "ALTER TABLE $table_name AUTO_INCREMENT=" . $start_num);
        $this->db->execute();
        return $this->db;
    }


    protected function alter(string $table_name, string $old_col, string $constraints, string $new_col = null): Database
    {
        if (is_null($new_col)) {
            $new_col = $old_col;
        }
        $this->db->query(sql: "ALTER TABLE $table_name CHANGE $old_col $new_col" . $constraints);
        $this->db->execute();
        return $this->db;
    }


    protected function setPK(string $table_name, array $cols, string $constraint_name = null): Database
    {
        if (is_null($constraint_name)) {
            $this->db->query(sql: "ALTER TABLE $table_name ADD PRIMARY KEY (" . implode(",", $cols) . ")");
        } else {
            $this->db->query(sql: "ALTER TABLE $table_name ADD CONSTRAINT $constraint_name PRIMARY (" . implode(",", $cols) . ")");
        }
        $this->db->execute();
        return $this->db;
    }


    protected
    function setFK(string $table_name, string $key, string $ref): void
    {
//        $this->db->query(sql: "CREATE TABLE " . $table_name . "(" . $table_params . ")");
    }
}