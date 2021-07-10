<?php


class Database

{
    private string $db_host = DB_HOST;
    private string $db_user = DB_USER;
    private string $db_pass = DB_PASS;
    private string $db_name = DB_NAME;

    private PDOStatement $statement;
    private PDO $db_handler;
    private string $error;


    public function __construct()
    {
        $conn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->db_handler = new PDO($conn, $this->db_user, $this->db_pass, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }


    public function query(string $sql): void
    {
        $this->statement = $this->db_handler->prepare($sql);
    }

    public function bind(mixed $parameter, mixed $value, mixed $type = null): void
    {
        $type = match (is_null($type)) {
            is_int($value) => PDO::PARAM_INT,
            is_bool($value) => PDO::PARAM_BOOL,
            is_null($value) => PDO::PARAM_NULL,
            default => PDO::PARAM_STR,
        };
        $this->statement->bindValue($parameter, $value, $type);
    }


    public function execute(): void
    {
        $this->statement->execute();
    }


    public function resultSet(): array
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }


    public function getSingle(): mixed
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }


    public function rowCount(): int
    {
        $this->execute();
        return $this->statement->rowCount();
    }

}