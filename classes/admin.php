<?php

require_once 'client.php';
require_once 'car.php';


class Admin extends Client
{

    //Car managment
    public function listCars()
    {
        $stmt = $this->db->prepare("SELECT * FROM voiture");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addCar(Car $car)
    {
        $stmt = $this->db->prepare("INSERT INTO voiture (immatriculation, marque, modele, disponibilite) VALUES (:immatriculation, :marque, :modele, :disponibilite)");
        $attributes = $car->getAttributes();
        $stmt->execute([
            ':immatriculation' => $attributes['immatriculation'],
            ':marque' => $attributes['marque'],
            ':modele' => $attributes['modele'],  
            ':disponibilite' => $attributes['disponibilite']
        ]);
    }

    public function editCar(Car $car)
    {
        $stmt = $this->db->prepare("UPDATE voiture SET marque = :marque, modele = :modele, immatriculation = :immatriculation WHERE id = :carId");
        $attributes = $car->getAttributes();

        $stmt->execute([
            ':marque' => $attributes['marque'],
            ':modele' => $attributes['modele'],
            ':immatriculation' => $attributes['immatriculation'],
            ':carId' => $attributes['id']
        ]);
    }

    public function delCar($carId)
    {
        $stmt = $this->db->prepare("DELETE FROM voiture WHERE id = :carId");
        $stmt->execute([':carId' => $carId]);
    }

    //User managment 
    public function listUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delUser($userId)
    {
        $stmt = $this->db->prepare("DELETE FROM user WHERE id = :userId");
        $stmt->execute([':userId' => $userId]);
    }

    public function setAdmin($userId)
    {
        $stmt = $this->db->prepare("UPDATE user SET role = 'admin' WHERE id = :userId");
        $stmt->execute([':userId' => $userId]);
    }

    //Contract managment

    public function listContracts()
    {
        $stmt = $this->db->prepare("SELECT * FROM contrats");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editContract($contractId, $newDate)
    {
        $stmt = $this->db->prepare("UPDATE contrats SET date_debut = :newDate WHERE id = :contractId");
        $stmt->execute([
            ':newDate' => $newDate,
            ':contractId' => $contractId
        ]);
    }

    public function delContract($contractId)
    {
        $stmt = $this->db->prepare("DELETE FROM contrats WHERE id = :contractId");
        $stmt->execute([':contractId' => $contractId]);
    }
}