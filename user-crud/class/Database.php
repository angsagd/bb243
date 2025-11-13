<?php

class Database {
    
    // Database connection property
    public $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->connect();
    }

    // Establish database connection
    public function connect() {
        // if(!$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)) {
        //     exit('Connection failed');
        // }
        // return $this->conn;


        //* Cara PDO
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
    // Disconnect from the database
    public function disconnect() {
        // mysqli_close($this->conn);

        //* Cara PDO
        $this->conn = null;
    }

    // Execute a query with optional parameters
    public function query($sql, $params = []) {
        // Prepare and execute statement, return false for failed query
        // if(!$result = mysqli_query($this->conn, $sql)) {
        //     exit('Query failed: ' . mysqli_error($this->conn));
        // }
        // return $result;

        //* Cara PDO
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($params)) {
            return $stmt;
        }
        return false;
    }
}