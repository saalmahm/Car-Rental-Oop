<?php

class Contract
{
    private $id;
    private $clientId;
    private $carId;
    private $dateDebute;
    private $dateEnd;

    public function __construct( $clientId, $carId, $dateDebute, $dateEnd)
    {
        $this->clientId = $clientId;
        $this->carId = $carId;
        $this->dateDebute = $dateDebute;
        $this->dateEnd = $dateEnd;
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'clientId' => $this->clientId,
            'carId' => $this->carId,
            'dateDebute' => $this->dateDebute,
            'dateEnd' => $this->dateEnd
        ];
    }
}
