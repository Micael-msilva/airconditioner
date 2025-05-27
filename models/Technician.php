<?php

class Technician {
    private $name;
    private $cpfCnpj;
    private $phone;
    private $address;
    private $crea;

    /**
     * Construtor da classe Technician
     *
     * @param string $name
     * @param string $cpfCnpj
     * @param string $phone
     * @param string|null $address
     * @param string|null $crea
     */
    public function __construct($name, $cpfCnpj, $phone, $address = null, $crea = null) {
        $this->setName($name);
        $this->setCpfCnpj($cpfCnpj);
        $this->setPhone($phone);
        $this->setAddress($address);
        $this->setCrea($crea);
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getCrea() {
        return $this->crea;
    }

    public function setCrea($crea) {
        $this->crea = $crea;
    }
}
