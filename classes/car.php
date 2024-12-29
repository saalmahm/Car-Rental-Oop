<?php

class Car
{
    private $id;
    private $immatriculation;
    private $marque;
    private $modele;
    private $disponibilite;

    public function __construct($immatriculation, $marque, $modele, $disponibilite = true)
    {
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->disponibilite = $disponibilite;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAttributes()
    {
        return [
            "id" => $this->id,
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'modele' => $this->modele,
            'disponibilite' => $this->disponibilite
        ];
    }
}