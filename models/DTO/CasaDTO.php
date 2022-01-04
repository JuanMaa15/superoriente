<?php

class CasaDTO {

    private $id_casa;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_casa, $nombre) {

        $this->id_casa = $id_casa;
        $this->nombre = $nombre;

    }

    
    function getId_casa() {
        return $this->id_casa;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_casa($id_casa) {
        $this->id_casa = $id_casa;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}