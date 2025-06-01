<?php

class Pmoc {

    private $id;
    private $name;
    private $creation_date;
    private $service_address;
    private $id_technician;
    private $id_client;


    /**
     * Construtor da classe Pmoc
     *
     * @param string $id
     * @param string $name
     * @param string $creation_date
     * @param string $service_address
     * @param string $id_technician
     * @param string $id_client
     */
    public function __construct($id, $name, $creation_date, $service_address, $id_technician, $id_client) {
        $this->setId($id);
        $this->setName($name);
        $this->setCreation_date($creation_date);
        $this->setService_address($service_address);
        $this->setId_technician($id_technician);
        $this->setId_client($id_client);
    }



    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function getService_address() {
        return $this->service_address;
    }

    public function getId_technician() {
        return $this->id_technician;
    }

    public function getId_client() {
        return $this->id_client;
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
    }

    public function setService_address($service_address) {
        $this->service_address = $service_address;
    }

    public function setId_technician($id_technician) {
        $this->id_technician = $id_technician;
    }

    public function setId_client($id_client) {
        $this->id_client = $id_client;
    }

}
?>