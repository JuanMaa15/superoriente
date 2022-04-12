<?php

class CesantiaDTO {

    private $id_cesantia;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_cesantia, $nombre) {

        $this->id_cesantia = $id_cesantia;
        $this->nombre = $nombre;

    }

    function getId_cesantia() {
        return $this->id_cesantia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_cesantia($id_cesantia) {
        $this->id_cesantia = $id_cesantia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}