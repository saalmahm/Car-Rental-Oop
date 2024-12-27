<?php

require_once 'client.php';
require_once 'car.php';


class Admin extends Client
{

    //Car managment
    public function listCars()
    {

    }
    public function addCar(Car $car)
    {

    }
    public function editCar(Car $car)
    {

    }
    public function delCar($carId)
    {

    }

    //User managment 
    public function listUsers()
    {

    }
    public function delUser($userId)
    {

    }

    public function editAdmin($userId)
    {

    }

    //Contract managment

    public function listContracts()
    {

    }

    public function editContract($contractId, $newDate){

    }

    public function delContract($contractId){

    }
}