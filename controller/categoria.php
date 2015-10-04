<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author cybin
 */
class categoria {
    private $id;
    private $name;
    
    public function __construct($id_cat, $name_cat) {
        $this->id = $id_cat;
        $this->name = $name_cat;
    }
    
    public function setId($id_cat){
        $this->id = $id_cat;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setName($name_cat){
        
    }
    
}



