<?php
class Budget{
    private $id;
    private $client;
    private $technician;
    private $description;
    private $serviceAddress;
    private $value;

    /**
     * Constructor for the Budget class
     * @param int $id
     * @param Client $client
     * @param Technician $technician
     * @param string $serviceAddress
     * @param string $description
     * @param float $value
     */
    public function __construct($id, Client $client, Technician $technician, AirConditioner $airConditioner, 
    $serviceAddress, $installationDate, $status, $description, $value) {
        $this->id = $id;
        $this->client = $client;
        $this->technician = $technician;
        $this->airConditioner = $airConditioner;
        $this->serviceAddress = $serviceAddress;
        $this->installationDate = $installationDate;
        $this->status = $status;
        $this->description = $description;
        $this->value = $value;
        }

        public function getId() {
        return $this->id;
        }

        public function setId($id) {
        $this->id = $id;
        }

        public function getClient() {
        return $this->client;
        }

        public function setClient($client) {
        $this->client = $client;
        }

        public function getTechnician() {
        return $this->technician;
        }

        public function setTechnician($technician) {
        $this->technician = $technician;
        }

        public function getAirConditioner() {
        return $this->airConditioner;
        }

        public function setAirConditioner($airConditioner) {
        $this->airConditioner = $airConditioner;
        }

        public function getServiceAddress() {
        return $this->serviceAddress;
        }

        public function setServiceAddress($serviceAddress) {
        $this->serviceAddress = $serviceAddress;
        }

        public function getInstallationDate() {
        return $this->installationDate;
        }

        public function setInstallationDate($installationDate) {
        $this->installationDate = $installationDate;
        }

        public function getStatus() {
        return $this->status;
        }

        public function setStatus($status) {
        $this->status = $status;
        }

        public function getDescription() {
        return $this->description;
        }

        public function setDescription($description) {
        $this->description = $description;
        }

        public function getValue() {
        return $this->value;
        }

        public function setValue($value) {
        $this->value = $value;
        }
}