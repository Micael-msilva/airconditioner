<?php

class Client {
    private $name;
    private $phone;
    private $serviceAddress;

    /**
     * Construtor da classe Client
     *
     * @param string $name
     * @param string $phone
     * @param string $serviceAddress
     */
    public function __construct($name, $phone, $serviceAddress) {
        $this->setName($name);
        $this->setPhone($phone);
        $this->setServiceAddress($serviceAddress);
    }

    // Getter e Setter para Name
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    // Getter e Setter para Phone
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        // Aqui poderia ter validação de telefone
        $this->phone = $phone;
    }

    // Getter e Setter para Service Address
    public function getServiceAddress() {
        return $this->serviceAddress;
    }

    public function setServiceAddress($serviceAddress) {
        $this->serviceAddress = $serviceAddress;
    }
}
