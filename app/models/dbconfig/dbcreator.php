<?php

class DatabaseCreator {
    private $localhost;
    private $username;
    private $password;
    private $conn;

    public function __construct($localhost, $username, $password) {
        $this->localhost = $localhost;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createDatabase($databaseName) {
        $sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
        if ($this->conn->query($sql) === true) {
            echo "Database $databaseName created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

    public function createTable($tableName, $fields) {
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