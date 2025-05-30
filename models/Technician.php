<?php

class Technician {
    // Atributos privados
    private $name;
    private $email;
    private $phone;
    private $cpfCnpj;
    private $crea;
    private $address;
    private $id;

    /**
     * Construtor da classe Technician
     *
     * @param string $name Nome do técnico
     * @param string $email E-mail do técnico
     * @param string $phone Telefone do técnico
     * @param string $cpfCnpj CPF ou CNPJ do técnico
     * @param string|null $crea CREA do técnico (opcional)
     * @param string|null $address Endereço do técnico (opcional)
     */
    public function __construct($name, $email, $phone, $cpfCnpj, $id=0, $crea = null, $address = null) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setCpfCnpj($cpfCnpj);
        $this->setCrea($crea);
        $this->setAddress($address);
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
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
