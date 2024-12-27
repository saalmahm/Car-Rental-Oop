<?php

class Car
{
    private $immatriculation;
    private $marque;
    private $model;
    private $disponiblite;

    public function __construct($immatriculation, $marque, $model, $disponibilite)
    {
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->model = $model;
        $this->disponibilite = $disponibilite;
    }

    public function getAttributes()
    {
        return [
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'model' => $this->model,
            'disponiblite' => $this->disponiblite
        ];
    }
}