<?php
class DatabaseCreator {
    private $localhost;
    private $username;
    private $password;
    private $databaseName;
    private $conn;

    public function __construct($localhost, $username, $password, $databaseName) {
        $this->localhost = $localhost;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->databaseName);#when you create the database first time remove $this->database from the arguments passed then after creating the database put it back

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function createDatabase() {
        $sql = "CREATE DATABASE IF NOT EXISTS $this->databaseName";
        if ($this->conn->query($sql) === true) {
            echo "Database $this->databaseName created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

    public function createTable($tableName, $fields) {
        $this->conn->select_db($this->databaseName);
        $sql = "CREATE TABLE $tableName (";
        $sql .= implode(", ", $fields);
        $sql .= ")";
        if ($this->conn->query($sql) === true) {
            echo "Table $tableName created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
