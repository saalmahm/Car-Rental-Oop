<?php

require_once 'user.php';
require_once 'contract.php';
require_once 'car.php';

class Client extends User
{
    public function reserveCar(Contract $contract)
    {
        $stmt = $this->db->prepare("INSERT INTO contracts (client_id, car_id, date_debute, date_end) VALUES (:client_id, :car_id, :date_debute, :date_end)");
        $stmt->execute([
            ':client_id' => $this->id,
            ':car_id' => $contract->getAttributes()['carId'],
            ':date_debute' => $contract->getAttributes()['dateDebute'],
            ':date_end' => $contract->getAttributes()['dateEnd']
        ]);
    }

    public function listDisponibleCars()
    {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE disponibilite = 1"); // 1 pour disponible
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contractsHistory()
    {
        $stmt = $this->db->prepare("SELECT * FROM contracts WHERE client_id = :client_id");
        $stmt->execute([':client_id' => $this->id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}