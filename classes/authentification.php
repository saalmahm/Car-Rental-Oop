<?php

class Authentication
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function register($firstName, $lastName, $email, $password, $confirmPassword, $role = 'client')
    {

        try {

            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->fetchColumn() > 0) {
                return "This email is already registered.";
            }
            if ($password !== $confirmPassword) {
                return "Passwords do not match.";
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (firstName, lastName, email, password, role) VALUES (:firstName, :lastName, :email, :password, :role)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':role', $role);
            $stmt->execute();

            $userId = $this->db->lastInsertId();

            if ($userId) {

                $_SESSION['userId'] = $userId;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
            }

            return true;

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {

            $query = "SELECT * FROM Users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user || !password_verify($password, $user['password'])) {
                return "Invalid email or password.";
            }

            $_SESSION['userId'] = $user['id'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            return true;


        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        return true;
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['userId']);

    }

    public function isAdmin()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
