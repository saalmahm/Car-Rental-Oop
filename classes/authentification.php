<?php

class Authentication
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function register($firstName, $lastName, $email, $password, $role = 'client')
    {
    }

    public function login($email, $password)
    {
    }

    public function logout()
    {
    }

    public function isLoggedIn()
    {
    }

    public function isAdmin()
    {
    }
}
