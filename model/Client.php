<?php

class Client {

    private $name;
    private $phone;
    private $id;



    /**
     * Construtor da classe Client
     *
     * @param string $id
     * @param string $name
     * @param string $phone
     */
    public function __construct($name, $phone, $id = null) {
        $this->setName($name);
        $this->setPhone($phone);
        $this->setId($id);

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

    public function __toString() {
        return "Client [id={$this->id}, name={$this->name}, phone={$this->phone}]";
    }
}
?>