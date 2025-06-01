<?php

class Client {

    private $id;
    private $name;
    private $phone;


    /**
     * Construtor da classe Client
     *
     * @param string $id
     * @param string $name
     * @param string $phone
     */
    public function __construct($name, $phone, $id = null) {
        $this->setId($id);
        $this->setName($name);
        $this->setPhone($phone);
    }


    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

}
?>