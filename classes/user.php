<?php

class User
{
    protected $db;
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $role;


    public function __construct(PDO $db, $id, $first_name, $last_name, $email, $role)
    {
        $this->db = $db;
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return "$this->firstName $this->lastName";
    }

    public function getRole(){
        return $this->role;
    }

    public function editInfo($newFirstName, $newLastName)
    {

    }
}