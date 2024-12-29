<?php

require_once 'user.php';
require_once 'contract.php';
require_once 'car.php';
require_once 'car.php';

class Client extends User
{
    public function reserveCar(Contract $contract)
    {
        $stmt = $this->db->prepare("INSERT INTO contrats (id_user, id_voiture, date_debut , date_fin) VALUES (:client_id, :car_id, :date_debute, :date_end)");
        $stmt->execute([
            ':client_id' => $this->id,
            ':car_id' => $contract->getAttributes()['carId'],
            ':date_debute' => $contract->getAttributes()['dateDebute'],
            ':date_end' => $contract->getAttributes()['dateEnd']
        ]);
    }

    public function listDisponibleCars()
    {
        $stmt = $this->db->prepare("SELECT * FROM voiture WHERE disponibilite = 1"); // 1 pour disponible
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function contractsHistory()
    {
        $stmt = $this->db->prepare("
        SELECT c.id AS contract_id, v.marque, v.modele, c.date_debut, c.date_fin
        FROM contrats c
        JOIN voiture v ON c.id_voiture = v.id
        WHERE c.id_user = :client_id
    ");
        $stmt->execute([':client_id' => $this->id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}