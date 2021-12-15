<?php

class Type {
   
    Private $id;
    Private $libelleType;
    
    function __construct() {
        
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLibelleType($libelleType) {
        $this->libelleType = $libelleType;
    }

    function getId() {
        return $this->id;
    }

    function getLibelleType() {
        return $this->libelleType;
    }

     
}
