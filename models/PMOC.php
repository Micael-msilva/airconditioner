<?php
class PMOC {
    private $id;
    private $name;
    private $serviceAddress;
    private $client;
    private $technician;
    private $airConditioner;
    private $status;

    /**
     * Constructor for the PMOC class
     * @param int $id
     * @param Client $client
     * @param Technician $technician
     * @param AirConditioner $airConditioner
     * @param string $installationDate
     * @param string $serviceAddress
     * @param string $status
     */
    public function __construct($id, Client $client, Technician $technician, AirConditioner $airConditioner, 
                                $installationDate, $serviceAddress, $status) {
        $this->setId($id);
        $this->setClient($client);
        $this->setTechnician($technician);
        $this->setAirConditioner($airConditioner);
        $this->setInstallationDate($installationDate);
        $this->setServiceAddress($serviceAddress);
        $this->setStatus($status);
    }

    // Getters and Setters for each property...
}