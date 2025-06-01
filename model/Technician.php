<?php

class Technician {

    private $cpf_cnpj;
    private $name;
    private $address;
    private $phone;
    private $crea;
    private $email;


    /**
     * Construtor da classe Technician
     *
     * @param string $cpf_cnpj
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param string $crea
     * @param string $email
     */
    public function __construct($cpf_cnpj, $name, $address, $phone, $crea, $email) {
        $this->setCpf_cnpj($cpf_cnpj);
        $this->setName($name);
        $this->setAddress($address);
        $this->setPhone($phone);
        $this->setCrea($crea);
        $this->setEmail($email);
    }



    public function getCpf_cnpj() {
        return $this->cpf_cnpj;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCrea() {
        return $this->crea;
    }

    public function getEmail() {
        return $this->email;
    }



    public function setCpf_cnpj($cpf_cnpj) {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setCrea($crea) {
        $this->crea = $crea;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}
?>