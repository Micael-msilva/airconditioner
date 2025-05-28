<?php
class AirConditioner {
    private $brand;
    private $id;
    private $description;
    private $model;


    /**
     * Constructor for the AirConditioner class
     * @param string $brand
     * @param string $id
     * @param string|null $description
     */
    public function __construct($brand, $id, $description) {
    $this->setBrand($brand);
    $this->setId($id);
    $this->setDescription($description);
    }

    public function getBrand() {
    return $this->brand;
    }

    public function setBrand($brand) {
    $this->brand = $brand;
    }

    public function getId() {
    return $this->id;
    }

    public function setId($id) {
    $this->id = $id;
    }

    public function getDescription() {
    return $this->description;
    }

    public function setDescription($description) {
    $this->description = $description;
    }
}