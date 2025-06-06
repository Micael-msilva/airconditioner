<?php

class AirConditioner {

    private $id;
    private $brand;
    private $btus;
    private $description;
    private $location;
    private $id_pmoc;


    /**
     * Construtor da classe AirConditioner
     *
     * @param int $id
     * @param string $brand
     * @param int $btus
     * @param string $description
     * @param string $location
     * @param int $id_pmoc
     */
    public function __construct( $brand, $btus, $description, $location, $id_pmoc,$id=null) {
        $this->setBrand($brand);
        $this->setBtus($btus);
        $this->setDescription($description);
        $this->setLocation($location);
        $this->setId_pmoc($id_pmoc);
        $this->setId($id);

    }



    public function getId() {
        return $this->id;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getBtus() {
        return $this->btus;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getId_pmoc() {
        return $this->id_pmoc;
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function setBtus($btus) {
        $this->btus = $btus;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setId_pmoc($id_pmoc) {
        $this->id_pmoc = $id_pmoc;
    }

}
?>