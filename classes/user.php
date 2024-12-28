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
        $this->firstName = $first_name;
        $this->lastName = $last_name;
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

    public function getRole()
    {
        return $this->role;
    }

    public function editInfo($newFirstName, $newLastName)
    {
        $this->firstName = $newFirstName;
        $this->lastName = $newLastName;

        $stmt = $this->db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name WHERE id = :id");
        $stmt->execute([
            ':first_name' => $newFirstName,
            ':last_name' => $newLastName,
            ':id' => $this->id
        ]);
    }
}
