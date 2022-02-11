<?php

class PensionDTO {

    private $id_pension;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_pension, $nombre) {

        $this->id_pension = $id_pension;
        $this->nombre = $nombre;

    }

    
    function getId_pension() {
        return $this->id_pension;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_pension($id_pension) {
        $this->id_pension = $id_pension;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}