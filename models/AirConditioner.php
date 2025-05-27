<?php
class AirConditioner {
    private $brand;
    private $model;
    private $serialNumber;
    private $description;

    /**
     * Constructor for the AirConditioner class
     * @param string $brand
     * @param string $model
     * @param string $serialNumber
     * @param string|null $description
     */
    public function __construct($brand, $model, $serialNumber, $description) {
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setSerialNumber($serialNumber);
        $this->setdescription($description);
    }
    // Getter and Setter for Brand
    public function getBrand() {
        return $this->brand;
    }
    public function setBrand($brand) {
        $this->brand = $brand;
    }
    // Getter and Setter for Model
    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }
    // Getter and Setter for Serial Number
    public function getSerialNumber() {
        return $this->serialNumber;
    }
    public function setSerialNumber($serialNumber) {
        $this->serialNumber = $serialNumber;
    }
    // Getter and Setter for Installation Date
    public function getDescription() {
        return $this->Description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
}