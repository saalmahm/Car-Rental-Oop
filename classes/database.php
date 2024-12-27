<?php

require_once 'dbPassword.php';
class DatabaseConnection
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = $dbPassword;
    private $dbName = "";
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}