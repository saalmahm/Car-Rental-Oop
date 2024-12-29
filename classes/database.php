<?php

require_once 'dbPassword.php';

class DatabaseConnection
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass;
    private $dbName = "gestion_location_oop";
    private $conn;

    public function __construct($dbPass)
    {
        $this->dbPass = $dbPass;
        try {
            $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$db = new DatabaseConnection($dbPassword);
