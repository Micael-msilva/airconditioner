<?php
class PMOC {
    private $id;
    private $client;
    private $technician;
    private $airConditioner;
    private $installationDate;
    private $serviceAddress;
    private $creationDate;

    /**
     * Constructor for the PMOC class
     * 
     * @param int $id
     * @param Client $client
     * @param Technician $technician
     * @param AirConditioner $airConditioner
     * @param string $installationDate
     * @param string $serviceAddress
     * @param string $creationDate
     */
    public function __construct($id, $client, $technician, $airConditioner, $installationDate, $serviceAddress, $creationDate) {
        $this->setId($id);
        $this->setClient($client);
        $this->setTechnician($technician);
        $this->setAirConditioner($airConditioner);
        $this->setInstallationDate($installationDate);
        $this->setServiceAddress($serviceAddress);
        $this->setCreationDate($creationDate);
    }

    // Getter and Setter for Id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for Client
    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    // Getter and Setter for Technician
    public function getTechnician() {
        return $this->technician;
    }

    public function setTechnician($technician) {
        $this->technician = $technician;
    }

    // Getter and Setter for AirConditioner
    public function getAirConditioner() {
        return $this->airConditioner;
    }

    public function setAirConditioner($airConditioner) {
        $this->airConditioner = $airConditioner;
    }

    // Getter and Setter for InstallationDate
    public function getInstallationDate() {
        return $this->installationDate;
    }

    public function setInstallationDate($installationDate) {
        $this->installationDate = $installationDate;
    }

    // Getter and Setter for ServiceAddress
    public function getServiceAddress() {
        return $this->serviceAddress;
    }

    public function setServiceAddress($serviceAddress) {
        $this->serviceAddress = $serviceAddress;
    }

    // Getter and Setter for CreationDate
    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }
}