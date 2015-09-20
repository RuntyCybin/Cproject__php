<?php

require_once 'createConnection.php';

class user {
    private $id;
    private $nombre;
    private $nickname;
    private $edad;
    private $categoria;
    private $id_categoria;

    public function __construct($new_id, $new_name, $new_nick, $new_age, $new_cat, $new_idcat) {
        $this->id = $new_id;
        $this->nombre = $new_name;
        $this->nickname = $new_nick;
        $this->edad = $new_age;
        $this->categoria = $new_cat;
        $this->id_categoria = $new_idcat;
    }

    public function setId($new_id) {
        $connection = new createConnection(); //i created a new object

        $connection->connectToDatabase(); // connected to the database

        $this->id = $new_id;
        
    }

    public function getId() {
        return $this->id;
    }

    public function setName($new_name) {
        $this->nombre = $new_name;
    }

    public function getName() {
        return $this->nombre;
    }

    public function setNick($new_nick) {
        $this->nickname = $new_nick;
    }

    public function getNick() {
        return $this->nickname;
    }

    public function setAge($new_age) {
        $this->edad = $new_age;
    }

    public function getAge() {
        return $this->edad;
    }

    public function setCat($new_cat) {
        $this->categoria = $new_cat;
    }

    public function getCat() {
        return $this->categoria;
    }

    public function setIdCat($new_idCat) {
        $this->id_categoria = $new_idCat;
    }

    public function getIdCat() {
        return $this->id_categoria;
    }

}
