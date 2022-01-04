<?php

class GeneroDTO {

    private $id_genero;
    private $nombre;
    
    function __construct() {
        
    }

    
    function constructor($id_genero, $nombre) {
        $this->id_genero = $id_genero;
        $this->nombre = $nombre;
    }

    function getId_genero() {
        return $this->id_genero;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_genero($id_genero) {
        $this->id_genero = $id_genero;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}